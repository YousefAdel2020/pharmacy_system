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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Country</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->address }}</td>
                                    <td>{{ $area->country->name }}</td>

                                    <td>
                                        <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-sm">View </a>
                                        <a href="{{ route('areas.edit', $area->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('areas.destroy', $area->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
