@extends('layout.main')
@section('title','Roles')
@section('content')
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
        <table class=" table table-bordered">
            <thead >
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endsection