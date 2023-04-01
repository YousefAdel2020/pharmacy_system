@extends('layouts.adminlte')

@section('title', 'User Addresses')


@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All User Addresses</h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="{{ route('user-address.create') }}">Create New User Address</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {{ $dataTable->table() }}
        </div>


        <!-- /.card-body -->
    </div>



@endsection

@section('script')

    {{ $dataTable->scripts() }}

@endsection
