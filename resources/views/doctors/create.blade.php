@extends('layouts.adminlte')

@section('title', 'Doctor')

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

<div class="container">
    <form class="form" action="{{ route('doctors.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row pt-5">
            <div class="col-sm-3"><!--left col-->

                <div class="text-center">
                    <img src="{{ asset('storage/unknown.png') }}" class="img-circle img-thumbnail" alt="avatar">
                    <h6 class="mt-3">Upload a different photo...</h6>
                    <input type="file" name="avatar">
                </div>
            </div><!--/col-3-->

            <div class="col-sm-9">

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">
                                <h4>Name</h4>
                            </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="First name"
                                required>
                        </div>

                        <div class="col-6">
                            <label for="national_id">
                                <h4>National ID</h4>
                            </label>
                            <input type="number" class="form-control" name="national_id" id="national_id"
                                placeholder="National ID" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="email">
                            <h4>Email</h4>
                        </label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email"
                            required>
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
                            placeholder="password2" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12 mb-5">
                        <button class="btn btn-lg btn-success" type="submit">Create</button>
                        <button class="btn btn-lg" type="reset">Reset</button>
                    </div>
                </div>



            </div><!-- Col-9 -->
        </div><!-- Row -->
    </form>
</div><!-- Container -->
@endsection