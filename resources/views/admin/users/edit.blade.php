@extends('layout.main')
@section('title','User edit')
@section('content')
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
        <form method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{$user->name}}" disabled>

            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>

            </div>
            <select class="form-control" id="exampleFormControlSelect1" name="role[]" multiple>
                @foreach($roles as $role)
                    <option value="{{$role->name}}"
                        @if(in_array($role->name,$selected_roles))
                            selected="selected"
                        @endif
                    >{{$role->name}}</option>
                    @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    @endsection