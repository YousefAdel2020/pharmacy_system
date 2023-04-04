@extends('layouts.adminlte')

@section('title', 'Orders')



@section('content')
<div class="container">
    {{$dataTable->table()}}
</div>
@endsection

@section('script')
{{$dataTable->scripts()}}
@endsection