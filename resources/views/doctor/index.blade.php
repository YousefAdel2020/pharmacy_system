@extends('layouts.adminlte')

@section('title', 'Doctor')

@section('content')




<table id="myTable">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>National-ID</th>
            <th>Created_At</th>
            <th>Pharmacy Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>shehab</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>omar</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>viola</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>

    </tbody>
</table>
@endsection

{{-- @section('content')
<table id="myTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>shehab</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>omar</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>viola</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>

    </tbody>
</table>
@endsection --}}





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