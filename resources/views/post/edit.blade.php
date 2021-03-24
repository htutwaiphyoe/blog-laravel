@extends('layout.main')
@section('title','Post Edit')
@section('content')
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-info text-center">Post Edit</h1>
            <form method="post">
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
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"  placeholder="Enter title" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="cat_id">Category</label>
                    <select class="form-control" id="cat_id" name="cat_id">
                        @foreach($categories as $category)

                            <option value="{{$category->id}}"
                            @if($category->id == $post->cat_id)
                                selected
                                @endif
                            >{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="5" name="content">{{$post->content}}</textarea>
                </div>
                <input type="hidden" name="user_id" value="{{$post->user_id}}">
                <button type="submit" class="btn btn-outline-info">Edit</button>
            </form>
        </div>
    </div>
@endsection