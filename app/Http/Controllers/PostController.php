<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
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
        // $posts = DB::table('posts')->get();
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'DESC')->get();

        // to use SQL request
        // DB::raw('Select *');

        // dd('posts');

        return view('posts.list', compact('posts'));

    }

    //
    public function detail($id)
    {
        //
        $post = Post::find($id);

        // to use SQL request
        // DB::raw('Select *');

        // dd($id);

        return view('posts.detail', compact('post'));

    }

    //
    public function create()
    {
        //
        // $posts = DB::table('posts')->get();
        //$posts = Post::all();
        // $posts = Post::orderBy('created_at', 'DESC')->get();

        // to use SQL request
        // DB::raw('Select *');

        // dd('posts');

        return view('posts.create');

    }

    //
    /*
    public function store(Request $request)
    {

        $data = $request->all();

        // if all the name tags from the form matches the table column
        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'extrait' => $data['extrait'],
            'description' => $data['description']
            // 'created_at' => $data['title'],
        ]);

        // dd('It works');

        return redirect()->route('articleList');

    }
    */
    public function store(PostStoreRequest $request)
    {

        $data = $request->validated();

        $post = Post::create($data);

        // dd($post);

        return redirect()->route('articleList');

    }

    //
    public function update(PostStoreRequest $request, $id)
    {

        $data = $request->all();

        //
        $post = Post::find($id);

        // Method 1 to update
        $post->update($data);

        // Method 2 to update
        // $post->$title = $data['title'];

        return redirect()->route('articleList');

    }

    //
    public function delete($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        // dd($id);

        // return view('posts.detail', compact('post'));
        return back();

    }
}
