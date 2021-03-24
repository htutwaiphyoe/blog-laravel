@extends('layout.main')
@section('title','Category')
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2 ">
            <table class="my-5 table table-bordered">
                <thead >
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}
                            <a href="{{action('Admin\CategoryController@edit',$category->id)}}"><span class="fa fa-edit float-right text-info"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection