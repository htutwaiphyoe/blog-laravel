@extends('layout.main')
@section('title','Posts')
@section('content')
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{action('PostCreator\PostController@show',$post->slug)}}" class="text-info">{{$post->title}}</a></td>
                        <td>{{substr($post->content,0,100)."....."}}</td>
                        <td><a href="{{action('PostCreator\PostController@edit',$post->id)}}"><span class="fa fa-edit text-info"></span></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection