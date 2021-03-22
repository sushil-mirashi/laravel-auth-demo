<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class ArticleController extends Controller
{
    public function index(){
        $allArticles = Cache::remember('getarticles', 5 , function(){
             return DB::table('articles')->get();
        });
        // Cache::pull('getarticles');
        // Cache::put('testkey','testvalue',2);
        // dd(Cache::get('testkey'));
        // $allArticles = DB::table('articles')->get();
        return response()->json($allArticles);
    }
}
