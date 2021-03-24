@extends('layout.main')
@section('title','User Login')
@section('content')
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
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
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email"  placeholder="Enter email" name="email">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary my-1">Submit</button>
            </form>
        </div>
    </div>
    @endsection