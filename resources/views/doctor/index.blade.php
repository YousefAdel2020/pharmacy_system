@extends('layouts.adminlte')

@section('title', 'Doctor')

@section('content')




<table id="myTable" class="table-striped">
    <thead>
        <tr>
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">National-ID</th>
            <th scope="col">Created_At</th>
            <th scope="col">Pharmacy Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block" width="10%"></td>
            <td>shehab</td>
            <td>shehab@gmail.com</td>
            <td>123456789</td>
            <td>26-32023</td>
            <td>Elezaby</td>
            <td>Not Banned</td>
            <td>Actions</td>
        </tr>
        <tr>
            <td><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block" width="10%"></td>
            <td>omar</td>
            <td>omar@gmail.com</td>
            <td>123456789</td>
            <td>26-32023</td>
            <td>Elezaby</td>
            <td>Not Banned</td>
            <td>Actions</td>
        </tr>
        <tr>
            <td><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block" width="10%"></td>
            <td>Mahmoud</td>
            <td>Mahmoud@gmail.com</td>
            <td>123456789</td>
            <td>26-32023</td>
            <td>eltyby</td>
            <td>Banned</td>
            <td>Actions</td>
        </tr>

    </tbody>
</table>
@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endsection