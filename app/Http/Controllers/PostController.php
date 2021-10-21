<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdatePictureRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $file = Storage::put('public', $data['picture']);

        $data['picture'] = substr($file, 7);

        $post = Post::create($data);

        // dd($post);

        return redirect()->route('articleList');

    }

    //
    public function showUpdate($id)
    {
        //
        $post = Post::find($id);

        return view('posts.update', compact('post'));

    }

    //
    public function update(PostUpdateRequest $request, $id)
    {

        // $data = $request->all();
        $data = $request->validated();

        //
        $post = Post::find($id);

        // Method 1 to update
        $post->update($data);

        // Method 2 to update
        // $post->$title = $data['title'];

        return redirect()->route('articleDetail', $id);

    }

    //
    public function updatePicture(PostUpdatePictureRequest $request, $id)
    {

        $data = $request->validated();

        //
        $post = Post::find($id);

        //
        if(Storage::exists("public/$post->picture")){
            Storage::delete("public/$post->picture");
        }

        $file = Storage::put('public', $data['picture']);

        $data['picture'] = substr($file, 7);

        /*
        // First way to update
        $post = Post::update([
            'picture'
        ]);
        */

        // Second way to update
        $post->picture = $data['picture'];
        $post->save();

        return redirect()->route('articleDetail', $id);

    }

    //
    public function delete($id)
    {
        //
        $post = Post::find($id);

        //
        if(Storage::exists("public/$post->picture")){
            Storage::delete("public/$post->picture");
        }

        $post->delete();

        // dd($id);

        // return view('posts.detail', compact('post'));
        return back();

    }
}
