@extends('layouts.adminlte')

@section('title', 'edit medicine')



@section('content')

    <div class="card card-success">
                 <div class="card-header">
                   <h3 class="card-title">Create medicine</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form>
                   <div class="card-body">
                    <div class="form-group">
                       <label for="exampleInputName1">Medicine Name</label>
                       <input type="name" class="form-control" id="exampleInputName1" name="medicine_name" placeholder="Enter Medicine Name">
                     </div> 
                    <div class="form-group">
                       <label for="exampleInputEmail1">Price (in cents)</label>
                       <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Enter Price in cents">
                     </div>
                     <div class="form-group">
                       <label for="exampleInputDescreption1">Descreption</label>
                       <input type="text" class="form-control" id="exampleInputDescreption1" placeholder="Descreption">
                     </div>
                    
                   </div>
                   <!-- /.card-body -->

                   <div class="card-footer">
                     <button type="submit" class="btn btn-success">update</button>
                   </div>
                 </form>
               </div>
               <!-- /.card -->
@endsection