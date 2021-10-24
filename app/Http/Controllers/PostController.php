<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdatePictureRequest;
use App\Http\Requests\PostUpdateRequest;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    //
    public function store(PostStoreRequest $request)
    {

        $data = $request->validated();

        $file = Storage::put('public', $data['picture']);

        $data['picture'] = substr($file, 7);

        $data['user_id'] = auth()->user()->id;

        // dd($data);
        //
        $post = Post::create($data);

        /*
            // check if one category has been selected
            // (for me it's required so I comment this part)
            if(!empty($data['category_list']))
            {
                $post->categories()->attach($data['category_list']);
            }
        */

        $post->categories()->attach($data['category_list']);

        return redirect()->route('articleList');
    }

    //
    public function showUpdate($id)
    {
        //
        $post = Post::find($id);

        $categories = Category::all();

        return view('posts.update', compact(['post', 'categories']));

    }

    //
    public function update(PostUpdateRequest $request, $id)
    {

        // $data = $request->all();
        $data = $request->validated();

        // dd($data);

        //
        $post = Post::find($id);

        // Method 1 to update
        $post->update($data);

        // we detach all the categories
        // in case one box was unchecked so it is taken into account
        $post->categories()->detach();

        /*
            // check if one category has been selected
            // (for me it's required so I comment this part)
            if(!empty($data['category_list']))
            {
                $post->categories()->attach($data['category_list']);
            }
        */

        $post->categories()->attach($data['category_list']);

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

        $post->categories->detach();

        $post->delete();

        // dd($id);

        // return view('posts.detail', compact('post'));
        return back();

    }
}
