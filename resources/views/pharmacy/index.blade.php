@extends('layouts.adminlte')

@section('title', 'Home Page')

@section('content')




<table id="myTable" class="table-striped">
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