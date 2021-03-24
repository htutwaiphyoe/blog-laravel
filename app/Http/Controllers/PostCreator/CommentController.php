<?php

namespace App\Http\Controllers\PostCreator;

use App\Comment;
use App\Http\Requests\CommentInsertFormRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(CommentInsertFormRequest $request)
    {
        Comment::create([
            "content" => $request->get('content'),
            "user_id" => $request->get('user_id'),
            "commentable_id" => $request->get('commentable_id'),
            "commentable_type" => $request->get('commentable_type')
        ]);
        $post = Post::findOrFail($request->get('commentable_id'));

        return redirect(action('PostCreator\PostController@show',$post->slug));
    }
}
