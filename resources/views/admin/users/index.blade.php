@extends('layout.main')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 ">
        <table class="my-5 table table-bordered">
            <thead >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{action('Admin\UserController@edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection