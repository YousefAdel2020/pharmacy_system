@extends('layouts.adminlte')

@section('title', 'Doctor')

<link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
@section('content')


<h1 class="text-center py-3">Doctors</h1>

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
            <td style="width: 5em;"><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block"
                    width="70%"></td>
            <td>shehab</td>
            <td>shehab@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2023</td>
            <td>Elezaby</td>
            <td>Not Banned</td>
            <td>
                <a href="{{ route('doctors.edit', 1) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('doctors.destroy', 1) }}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                </form>
                <a href="#" title="UnBan"><i class="fa-solid fa-user-slash red"></i></a>
                <a href="#" title="Ban"><i class="fa-solid fa-user green"></i></a>
            </td>
        </tr>
        <tr>
            <td style="width: 5em;"><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block"
                    width="70%"></td>
            <td>omar</td>
            <td>omar@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2023</td>
            <td>Elezaby</td>
            <td>Not Banned</td>
            <td>
                <a href="{{ route('doctors.edit', 1) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('doctors.destroy', 1) }}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                </form>
                <a href="#" title="UnBan"><i class="fa-solid fa-user-slash red"></i></a>
                <a href="#" title="Ban"><i class="fa-solid fa-user green"></i></a>
            </td>
        </tr>
        <tr>
            <td style="width: 5em;"><img src="{{ asset('storage/unknown.png') }}" alt="Post Image" class="d-block"
                    width="70%"></td>
            <td>Mahmoud</td>
            <td>Mahmoud@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2023</td>
            <td>eltyby</td>
            <td>Banned</td>
            <td>
                <a href="{{ route('doctors.edit', 1) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('doctors.destroy', 1) }}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                </form>

                <a href="#" title="UnBan"><i class="fa-solid fa-user-slash red"></i></a>
                <a href="#" title="Ban"><i class="fa-solid fa-user green"></i></a>
            </td>
        </tr>

    </tbody>
</table>
<a class="btn btn-success" href="{{ route('doctors.create')}}">Add New Doctor</a>
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
<script src="https://kit.fontawesome.com/212d832ea4.js" crossorigin="anonymous"></script>
@endsection