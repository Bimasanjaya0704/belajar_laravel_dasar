<?php

namespace Tests\Feature;
use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
  
    public function testDeepedencyContainer()
    {
    $foo = $this->app->make(Foo::class);
    $foo2 = $this->app->make(Foo::class);

    self::assertEquals("Foo and Bar", $foo->foo());
    self::assertEquals("Foo and Bar", $foo2->foo());
    self::assertNotSame($foo, $foo2);
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
}
