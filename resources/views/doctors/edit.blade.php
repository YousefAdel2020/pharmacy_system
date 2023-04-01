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
    <form class="form" action="{{ route('doctors.update', $doctor->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row pt-5">
            <div class="col-sm-3"><!--left col-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center">
                            @if($doctor->avatar)
                            <img src="{{ asset( $doctor->avatar )}}" alt="doctor" class="rounded-circle" width="150">
                            @else
                            <img src="{{ asset( 'storage/avatars/unknown.png' )}}" alt="doctor" class="rounded-circle"
                                width="150">
                            @endif
                            <h6 class="mt-3">Upload a different photo...</h6>
                            <input class="ms-5" type="file" name="avatar">
                        </div>
                    </div>
                </div>
            </div><!--/col-3-->

            <div class="col-sm-9">

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">
                                <h4>Name</h4>
                            </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}"
                                required>
                        </div>

                        <div class="col-6">
                            <label for="national_id">
                                <h4>National ID</h4>
                            </label>
                            <input type="number" class="form-control" name="national_id" id="national_id"
                                value="{{ $doctor->national_id }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="email">
                            <h4>Email</h4>
                        </label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $doctor->email }}">
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
                        <button class="btn btn-lg btn-success" type="submit">Save</button>
                        <button class="btn btn-lg" type="reset">Reset</button>
                    </div>
                </div>



            </div><!-- Col-9 -->
        </div><!-- Row -->
    </form>
</div><!-- Container -->
@endsection