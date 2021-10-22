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
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

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
        return view('posts.create');
    }

    //
    public function store(PostStoreRequest $request)
    {

        $data = $request->validated();

        $file = Storage::put('public', $data['picture']);

        $data['picture'] = substr($file, 7);

        $post = Post::create($data);

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
