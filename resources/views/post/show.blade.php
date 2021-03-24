@extends('layout.main')
@section('title',$post->title)
@section('content')
<div class="container my-5">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>

                <p class="card-text">
                    {{$post->content}}
                </p>

            </div>
        </div>
        <div class="card my-3">
            <div class="card-header bg-info">
                Leave your comment
            </div>
            <div class="card-body">
                <form method="post" action="{{url('postcreator/comment/create')}}">
                    <div class="form-group">
                        {{csrf_field()}}
                        @foreach($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{$error}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('status')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <input type="hidden" name="commentable_type" value="App\Post">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="commentable_id" value="{{$post->id}}">
                        <textarea class="form-control" id="content" rows="3" name="content" placeholder="What is on your mind?"></textarea>
                        <button class="btn btn-info btn-sm my-3">Comment</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="card my-3">
            <div class="card-header bg-dark text-white">
                Comments
            </div>

                @foreach($comment_data as $comment)
                <div class="card-body">
                <h5>{{$comment[0]}}</h5>
                <p class="card-text">{{$comment[1]}}</p>
                </div>
                @endforeach

        </div>
    </div>
</div>


@endsection