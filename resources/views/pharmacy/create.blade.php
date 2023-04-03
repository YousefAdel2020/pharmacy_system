@extends('layouts.adminlte')

@section('title', 'Add New Pharmacy')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">Add New Pharmacy</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form class="form p-4"  action="{{route('pharmacies.store')}}"method="post" enctype="multipart/form-data">
                 @csrf

                   <div class="form-group">
                      <strong><p class="mt-3">For Uploading a different photo...</p></strong>
                      <img src="{{ asset('storage/unknown.png') }}" class="img-circle img-thumbnail" alt="avatar">
                      <input type="file" name="avatar">
                    </div> 

                    <div class="form-group">
                       <label for="name">Pharmacy Name</label>
                       <input type="name"required class="form-control" id="exampleInputName1" name="pharmacy_name" placeholder="Enter Pharmacy Name">
                     </div> 

                     <div class="form-group">
                       <label for="national_id">National-ID</label>
                       <input type="number" class="form-control" requiredid="exampleInputDescreption1" name="national_id" placeholder="National-ID">
                     </div>

                    <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Pharmacy Emaill">
                     </div>
                     <div class="form-group">
                       <label for="password">Password</label>
                       <input type="password" class="form-control" name="password" id="password" placeholder="password"
                            required>
                       </div>

                       <div class="form-group">
                       <label for="password2">Verify</label>
                       <input type="password" class="form-control" name="password2" id="password2"
                            placeholder="password2" required>
                       </div>
                 
                   </div>
                   <!-- /.card-body -->

                   <div class="card-footer">
                   <button class="btn btn-lg btn-primary" type="submit">Create</button>
                        <button class="btn btn-lg" type="reset">Reset</button>                   </div>
                 </form>
               </div>
               
               <!-- /.card -->
@endsection