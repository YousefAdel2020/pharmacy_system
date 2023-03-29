@extends('layouts.adminlte')


@section('title', 'Create User')



@section('content')

  <div class="container">
    <div class="my-3">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
    <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">Create User</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form action="{{route("users.update",$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                   <div class="card-body">
                    <div class="form-group">
                       <label for="exampleInputName1">Name</label>
                       <input type="name" class="form-control" id="exampleInputName1" placeholder="Enter name">
                     </div> 
                    <div class="form-group">
                       <label for="exampleInputEmail1">Email address</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputPassword1">Password</label>
                       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                     </div>
                     <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="primaryAddress" name="isPrimaryAddress">
                    <label class="form-check-label" for="primaryAddress">Has insurance</label>
                </div>
                   </div>
                   <!-- /.card-body -->

                   <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                 </form>
               </div>
               <!-- /.card -->
  </div>
@endsection