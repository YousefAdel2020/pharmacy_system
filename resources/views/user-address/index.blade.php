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
            <table id="user-addresses-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Area </th>
                        <th>Street Name</th>
                        <th>Building Number</th>
                        <th>Floor Number</th>
                        <th>Flat Number</th>
                        <th>Is Main</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($userAddresses) --}}
                    @foreach ($userAddresses as $userAddress)
                        <tr>

                            <td>{{ $userAddress->user->name }}</td>
                            <td>{{ $userAddress->area->name }}</td>
                            {{-- <td>{{ $userAddress->city->name }}</td> --}}

                            <td>{{ $userAddress->street }}</td>
                            <td>{{ $userAddress->building_number }}</td>
                            <td>{{ $userAddress->floor_num }}</td>
                            <td>{{ $userAddress->apartment_num }}</td>
                            <td>{{ $userAddress->is_primary_address ? 'Yes' : 'No' }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ route('user-address.show', $userAddress->id) }}">Show</a>
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('user-address.edit', $userAddress->id) }}">Edit</a>
                                <form action="{{ route('user-address.destroy', $userAddress->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $('#user-addresses-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@stop
