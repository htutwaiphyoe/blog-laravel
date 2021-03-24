@extends('layout.main')
@section('title',"Admin Panel")
@section('content')
    <div class="container my-4  ">
        <div class="col-md-8 offset-md-2">
            <h3 class="text-center">Admin Panel</h3>
            <ul class="list-group my-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{url('admin/users')}}">Users</a>
                    <span class="badge badge-info badge-pill">{{count($users)}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{url('admin/roles')}}">Roles</a>
                    <a href="{{url('admin/roles/create')}}"> <span class="fa fa-plus-circle text-info"></span></a>

                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{url('admin/categories')}}">Categories</a>
                    <a href="{{url('admin/categories/create')}}"> <span class="fa fa-plus-circle text-info"></span></a>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{url('postcreator/posts')}}">Posts</a>
                    <a href="{{url('postcreator/posts/create')}}"> <span class="fa fa-plus-circle text-info"></span></a>
                </li>
            </ul>
        </div>
    </div>
    @endsection