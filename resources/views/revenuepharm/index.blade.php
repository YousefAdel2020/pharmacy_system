@extends('layouts.adminlte')

@section('title', 'Orders')



@section('content')
    {{$dataTable->table()}}
@endsection

@section('script')
{{$dataTable->scripts()}}
@endsection