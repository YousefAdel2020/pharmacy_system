@extends('layouts.adminlte')

@section('title', 'Add New Pharmacy')

@section('content')

    <div class="card card-success">
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
                       <label for="exampleInputName1">Pharmacy Name</label>
                       <input type="name" class="form-control" id="exampleInputName1" name="pharmacy_name" placeholder="Enter Pharmacy Name">
                     </div> 
                    <div class="form-group">
                       <label for="exampleInputEmail1">Email</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Pharmacy Emaill">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputDescreption1">National-ID</label>
                       <input type="text" class="form-control" id="exampleInputDescreption1" name="national_id" placeholder="National-ID">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputDescreption1">Created_At</label>
                       <input type="time" class="form-control" id="exampleInputDescreption1" placeholder="Created_At">
                     </div>
                   </div>
                   <!-- /.card-body -->

                   <div class="card-footer">
                     <button type="submit" class="btn btn-success">Submit</button>
                   </div>
                 </form>
               </div>
               
               <!-- /.card -->
@endsection