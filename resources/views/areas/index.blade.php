@extends('layouts.adminlte')
@section('title', 'Areas')
@section('content')
    <h1>Areas</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">List of Areas</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm">Add New Area</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{ $dataTable->table() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
    {{ $dataTable->scripts() }}

@endsection
