@extends('layouts.adminlte')

@section('title', 'Doctor')

<link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
@section('content')


<h1 class="text-center py-3">Doctors</h1>

<table id="doctors-table" class="table-striped">
	<thead>
		<tr>
			<th scope="col">Avatar</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">National-ID</th>
			<th scope="col">Created_At</th>
			<!-- <th scope="col">Pharmacy Name</th> -->
			<th scope="col">Status</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
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
{{ $dataTable->scripts() }}
@endsection