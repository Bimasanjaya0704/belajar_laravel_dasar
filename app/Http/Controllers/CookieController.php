<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response {
        return response('Hello Cookie')
        ->cookie('User-Id','Bima', 1000, '/')
        ->cookie('Is-Member','true',1000,'/');
    }

    public function getCookie(Request $request): JsonResponse {
        return response()
        ->json(
            [
            'UserId'=> $request->cookie('User-Id', 'guest'),
            'IsMember'=> $request->cookie('Is-Member', 'false'),
        ]);
    }

    public function deleteCookie(Request $request): Response {
        return response('Hapus Cookie')
        ->withoutCookie('User-Id')
        ->withoutCookie('Is-Member');
    }
}
