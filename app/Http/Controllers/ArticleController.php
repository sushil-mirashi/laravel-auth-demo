<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Article;
use App\Models\TestTable;


class ArticleController extends Controller
{
    public function index(){

        // $article = Article::select('*')->whereBetween('id', [4,10])->orderbyDesc('title')->get();
        // $article = Article::select('*')->orderbyDesc('id')->first();
        // $article = Article::select('*')->where('id','>',79)->get();
        // $article = Article::findOrFail(81);
        // $article->title = 'testing query';
        // $article->save();
        // $article = Article::where('id', [22,56])->update(['status' => 0]) ;
        // $article->status = 1;
        // return $article[0]->content;
        // $article = TestTable::where('created_at', '!=', 'null')->get();
        // return view('articles', compact('article'));
        // $article = Article::find(16);
        // return $article->user->name;
        // $allArticles = Cache::remember('getarticles', 5 , function(){
        //      return DB::table('articles')->get();
        // });
        // Cache::pull('getarticles');
        // Cache::put('testkey','testvalue',2);
        // dd(Cache::get('testkey'));
        // $allArticles = DB::table('articles')->get();
            $posts = Article::paginate(10);
        // // $data = DB::table('articles')->get()->paginate();
            return view('articles', compact('posts'));
        // return response()->json($allArticles);
    }

    // function index( $string = 'DigiGold', $action = 'e' ) {
    //     // we will change these values later
    //     $secret_key = 'ED-AUG-WAL6565-PK';
    //     $secret_iv = 'ED-AUG-WAL8979-IV';
    //     $output = false;
    //     $encrypt_method = "AES-256-CBC";
    //     $key = substr(hash( 'sha256', $secret_key ), 0, 32);
    //     $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
         
    //     // Pass e for encryption
    //     if( $action == 'e' ) {
    //          $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    //     }
    //     // Pass d for decryption
    //     else if( $action == 'd' ){
    //          $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    //     }
    //     return json_encode(array('key'=>$key,'iv'=>$iv,'output'=>$output));
    // }
}
