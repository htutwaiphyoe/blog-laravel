<?php

namespace App\Http\Controllers\PostCreator;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostInsertFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post/index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('post/create',compact('categories','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostInsertFormRequest $request)
    {
        $slug = str_replace([' ','_'],'-',trim(strtolower($request->get('title'))));
        Post::create([
            'title'=>$request->get('title'),
            "content" => $request->get('content'),
            'slug' => $slug,
            'user_id' => $request->get('user_id'),
            'cat_id' => $request->get('cat_id')
        ]);
        return redirect('postcreator/posts/create')->with('status','Post create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comment_data = [];
        $post = Post::where('slug',$slug)->firstOrFail();
        $comments = $post->comments;
        foreach ($comments as $comment)
        {
            $name = User::find($comment->user_id)->name;
            $content = $comment->content;
            array_push($comment_data,[$name,$content]);
        }

        $comment_data = json_decode(json_encode($comment_data),true);

        return view('post/show',compact('post','comment_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('post/edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostInsertFormRequest $request, $id)
    {
        $slug = str_replace([' ','_'],'-',strtolower(trim($request->get('title'))));
        Post::where('id',$id)->update([
           "title" => $request->get('title'),
            "content" => $request->get('content'),
            "slug" => $slug,
            "cat_id" => $request->get('cat_id')
        ]);
        return redirect(action('PostCreator\PostController@edit',$id))->with('status','Post edit success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
