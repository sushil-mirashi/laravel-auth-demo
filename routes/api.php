<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authtesting;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DataController;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class , 'register']);
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
});

Route::prefix('/admin')->name('admin')->group(function(){
    Route::post('/registerAdmin','AdminUserController@register');
    Route::get('/loginAdmin', 'AdminUserController@authenticate')->middleware('jwtauth');
    Route::post('/logout','LoginController@logout')->name('logout');
});

Route::get('/getarticles', function(){
    return response()->json(DB::table('articles')->get());
    // return Article::all();
});

Route::get('/getarticles/{id}', function($id){
    return response()->json(Article::findOrFail($id));
    // return Article::all();
});

Route::post('/createarticle', function(Request $request){
    $addArticle = Article::create([
        'title'=>$request->title,
        'content'=>$request->content,
    ]);

    return json_encode(['success'=>$addArticle]);
});