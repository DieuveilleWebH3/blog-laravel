<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function test()
    {
        // dd("Je suis ici");

        $loading = false;
        $posts = ['Post 1', 'Post 2', 'Post 3'];
        return view('test', compact('loading', 'posts'));

        /*
        return view(view: 'test')
            ->with('loading', $loading);
        */
    }

    //
    public function index()
    {
        //
        $posts = DB::table('posts')->get();

        // to use SQL request
        // DB::raw('Select *');

        // dd('posts');

        return view('posts.list', compact('posts'));

    }
}
