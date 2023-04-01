@extends('layouts.adminlte')

@section('title', 'Pharmacy')

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

<div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">Add New Pharmacy</h3>
                 </div> 
    <form class="form p-4"  method="POST" action="{{ route('pharmacies.update',$pharmacy->id) }}"  enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="row pt-3">
            <div class="col-sm-3"><!--left col-->

                <div class="text-center">
                    <img src="{{ asset('storage/unknown.png') }}" class="img-circle img-thumbnail" alt="avatar">
                    <h6 class="mt-3">Upload a different photo...</h6>
                    <input type="file" name="avatar">
                </div>
            </div><!--/col-3-->

            <div class="col-sm-9">

                <div class="form-group">
                    <div class="col-xs-6">
                       
                            <label for="name">
                                <h4>Pharmacy Name</h4>
                            </label>
                            <input type="name" class="form-control" name="pharmacy_name" placeholder="Enter Pharmacy Name">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="email">
                            <h4>Email</h4>
                        </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                            >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="password">
                            <h4>Password</h4>
                        </label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="password2">
                            <h4>Verify</h4>
                        </label>
                        <input type="password" class="form-control" name="password2" id="password2"
                            placeholder="Repet password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="Updated_At">
                            <h4>Updated_At</h4>
                        </label>
                        <input type="time"  class="form-control" name="password2" id="password2"
                            placeholder="Repet password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12 mt-5">
                        <button class="btn btn-lg btn-primary" type="submit">Save</button>
                        <button class="btn btn-lg" type="reset">Reset</button>
                    </div>
                </div>



            </div><!-- Col-9 -->
        </div><!-- Row -->
        
    </form>
</div>
@endsection