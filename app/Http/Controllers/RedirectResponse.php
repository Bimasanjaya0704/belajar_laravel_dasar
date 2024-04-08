<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse as HttpRedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;

class RedirectResponse extends Controller
{
    public function redirectTo(): string{
        return "Redirect To";
    }

    public function redirectFrom(): HttpRedirectResponse{
        return redirect("/redirect/to");
    }

    public function redirectName(): HttpRedirectResponse{
        return redirect()->route("redirect-hello", ["name"=> "Bimas"]);
    }

    public function redirectHello(string $name): string{
        return "Hallo $name";
    }

    public function redirectAction(): HttpRedirectResponse{
        return redirect()->action([RedirectResponse::class,"redirectHello"], ["name"=> "Bimas"]); 
    }

    public function redirectAway(): HttpRedirectResponse{
        return redirect()->away('https://bimasanjaya.me/');
    }
}
