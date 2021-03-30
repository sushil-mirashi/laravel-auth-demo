<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;

class Authtesting extends Controller
{
    public function index(Request $request){
        // dd($request->method());
        // dd(Auth::user()->name);
        Mail::to('sushilmirashi123@gmail.com')->send(new testMail());
        Log::info('mail sent');
        // Log::info('User '.$request->user()->name.' has accessed protected resources.');
        // dd($request->session()->token());
        // dd($request->session());
    }
}
