@extends('layouts.adminlte')

@section('title', 'edit medicine')



@section('content')

{{-- & the validation error message --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card card-success">
                 <div class="card-header">
                   <h3 class="card-title">Create medicine</h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                 <form method="POST" action="{{ route('medicines.update',$medicine->id) }}" enctype="multipart/form-data">
                  
                  @csrf
                  @method("put")

                   <div class="card-body">
                    <div class="form-group">
                       <label for="exampleInputName1">Medicine Name</label>
                       <input type="name" class="form-control" id="exampleInputName1" name="name" value="{{$medicine->name}}" placeholder="Enter Medicine Name">
                     </div> 
                    <div class="form-group">
                       <label for="exampleInputEmail1">Price (in cents)</label>
                       <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{$medicine->price}}" placeholder="Enter Price in cents">
                     </div>


                     <div class="form-group">
                      <label for="exampleInputEmail2">Type</label>
                      <input type="text" class="form-control" id="exampleInputEmail2" name="type" value="{{$medicine->type}}" placeholder="Enter type of medicine">
                    </div>

                     <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                      <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$medicine->description}}</textarea>
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