<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Authtesting;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadFile;

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
    Log::info('Log activated');
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // dd(Session::get('password'));
    // Log::info('User having id'.$_SESSION['id'].)
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->get('/testAuth',function(){
    return view('auth.confirm-password');
})->name('testAuth');

Route::middleware(['auth:sanctum','checkAccess'])->post('/testAuth',[Authtesting::class , 'index'])->name('testAuth');

Route::middleware(['auth:sanctum'])->get('/getArticles',[ArticleController::class , 'index'])->name('article.get');

Route::middleware(['auth:sanctum'])->get('/getUserArticles',[UserController::class , 'getArticlesUser'])->name('article.userget');

Route::get('/loginAdmin',[AdminUserController::class , 'index'])->name('admin.login');
Route::post('/loginAdmin',[AdminUserController::class , ''])->name('admin.verifylogin');

Route::get('/registeradmin',function(){
    return view('auth.registerAdmin');
})->name('admin.register');
Route::post('/registeradmin',[AdminUserController::class , ''])->name('admin.createadmin');

Route::get('/confirm-password',function(){
    return view('auth.confirm-password');
})->middleware(['auth'])->name('password.confirm');

//upload file and download
Route::get('/uploadImage', function(){
    return view('uploadimage');
});

Route::post('/uploadImage', [UploadFile::class, 'uploadimage'])->name('upload.image');

Route::get('/getfile', [UploadFile::class, 'getFile'])->name('file.get');

Route::get('/download', [UploadFile::class, 'downloadfile'])->name('file.download');


