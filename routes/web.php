<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Authtesting;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->get('/testAuth',function(){
    return view('auth.confirm-password');
})->name('testAuth');

Route::middleware(['auth:sanctum','checkAccess'])->post('/testAuth',[Authtesting::class , 'index'])->name('testAuth');

Route::middleware(['auth:sanctum'])->get('/getArticles',[ArticleController::class , 'index'])->name('article.get');

Route::get('/confirm-password',function(){
    return view('auth.confirm-password');
})->middleware(['auth'])->name('password.confirm');


