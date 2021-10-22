<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(CommentStoreRequest $request, $postId)
    {

        $data = $request->validated();

        $data['post'] = $postId;

        Comment::create($data);

        // return redirect()->route('articleList');

        // return redirect()->back();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return back();

    }
}
