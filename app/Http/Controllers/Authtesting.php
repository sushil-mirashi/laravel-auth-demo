<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authtesting extends Controller
{
    public function index(Request $request){
        // dd($request->method());
        dd(Auth::user());
    }
}
