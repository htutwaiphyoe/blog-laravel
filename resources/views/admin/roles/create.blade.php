@extends('layout.main')
@section('title','Roles')
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
               @if(session('status'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{session('status')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   @endif
               <div class="form-group">
                   <label for="name">Role</label>
                   <input type="text" class="form-control" id="name"  placeholder="Enter role" name="name">

               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>

       </div>
   </div>
@endsection