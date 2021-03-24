@extends('layout.main')
@section('title','Role edit')
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" value="" disabled>

                </div>
            </form>
        </div>
    </div>
    @endsection