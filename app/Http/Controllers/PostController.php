<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
