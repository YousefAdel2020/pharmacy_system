@extends('layouts.adminlte')

@section('title', 'Orders')



@section('content')
    <div class="container">
        <div class="text-center">
            <a href="{{ route('orders.create') }}" class="mt-4 btn btn-success">Create Order</a>
        </div>
        {{ $dataTable->table() }}
    </div>
@endsection

@section('script')
    {{ $dataTable->scripts() }}
@endsection
