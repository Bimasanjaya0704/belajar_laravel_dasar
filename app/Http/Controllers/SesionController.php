<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function createSesion(Request $request){
        $request->session()->put("userId", "bima");
        $request->session()->put("isMember","true");

        return 'OK';
    }

    public function getSession(Request $request){
        $userId = $request->session()->get('userId');
        $isMember = $request->session()->get('isMember');

        return "User Id : ${userId}, Is Member : ${isMember}";
    }
}
