<?php

namespace Tests\Feature;
use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;

class ServiceContainerTest extends TestCase
{
  
    public function testDeepedencyContainer()
    {
    $foo = $this->app->make(Foo::class);
    $foo2 = $this->app->make(Foo::class);

    self::assertEquals("Foo and Bar", $foo->foo());
    self::assertEquals("Foo and Bar", $foo2->foo());
    self::assertSame($foo, $foo2);
    }

    public function testBind()
    {
        $this->app->bind(Person::class, function ($app){
            return new Person ("Bima", "Sanjaya");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Bima", $person1->firstName);
        self::assertEquals("Sanjaya", $person2->lastName);
        self::assertNotSame($person1, $person2);

    }

    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app){
            return new Person ("Bima", "Sanjaya");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Bima", $person1->firstName);
        self::assertEquals("Bima", $person1->firstName);
        self::assertSame($person1, $person2);

    }

    public function testInstance(){
        $person = new Person ("Bima","Sanjaya");
        $this->app->instance(Person::class, $person);

        $person1= $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        $person3= $this->app->make(Person::class);
        $person4 = $this->app->make(Person::class);

        self::assertEquals("Bima", $person1->firstName);
        self::assertEquals("Bima", $person2->firstName);
        self::assertEquals("Sanjaya", $person3->lastName);
        self::assertEquals("Sanjaya", $person4->lastName);
        self::assertSame($person1, $person2);
        self::assertSame($person3, $person1);
    }
    public function testDepedencyInjectionFoo(){
        $this->app->singleton(Foo::class, function($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });

        $foo= $this->app->make(Foo::class);
        $bar= $this->app->make(Bar::class);
        $bar2= $this->app->make(Bar::class);

        self::assertEquals("Foo and Bar", $bar->bar());
        self::assertSame($foo, $bar->foo);
        self::assertSame($bar, $bar2);
    }

    public function testInterfaceToClass(){

        $this->app->singleton(HelloService::class, function($app) {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals("Halo Bima", $helloService->hello("Bima"));
    }
}