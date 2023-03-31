@extends('layouts.adminlte')

@section('title', 'Edit Area')



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit Area</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('areas.index') }}" class="btn btn-primary btn-sm">Back to List</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="POST" action="{{ route('areas.update', $area->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $area->name }}" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $area->address }}" placeholder="Enter address">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
