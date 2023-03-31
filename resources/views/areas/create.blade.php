@extends('layouts.adminlte')

@section('title', 'Create Area')

@section('content')
    <h1>Create Area</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="POST" action="{{ route('areas.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Address">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
