@extends('layouts.adminlte')

@section('title', 'Orders')



@section('content')
<div class="text-center">
            <a href="{{ route('orders.create') }}" class="mt-4 btn btn-success">Create Order</a>
        </div>
    {{$dataTable->table()}}
@endsection

@section('script')
{{$dataTable->scripts()}}
@endsection