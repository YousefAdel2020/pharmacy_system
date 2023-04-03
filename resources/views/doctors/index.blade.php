@extends('layouts.adminlte')

@section('title', 'Doctor')

<link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
@section('content')


<h1 class="text-center py-3">Doctors</h1>

<!-- <table id="doctors-table" class="table-striped">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">National-ID</th>
			<th scope="col">Created_At</th>
			<th scope="col">Pharmacy Name</th>
			<th scope="col">Status</th>
			<th scope="col">Is Banned</th>
		</tr>
	</thead>
</table> -->
{{ $dataTable->table() }}
<a class="btn btn-success" href="{{ route('doctors.create')}}">Add New Doctor</a>
@endsection

@if($update)
<div id="updateMsg" class="alert alert-success">Updated Successfully</div>
@endif

@if($delete)
<div id="deleteMsg" class="alert alert-success">Deleted Successfully</div>
@endif

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,

		});
	});
</script>

<script>
	const updateMsg = document.getElementById("updateMsg");
	const deleteMsg = document.getElementById("deleteMsg");
	window.addEventListener('load', function() {
		setTimeout(function() {
			updateMsg.remove();
		}, 1500);

		setTimeout(function() {
			deleteMsg.remove();
		}, 1500);
	});
</script>

<script src="https://kit.fontawesome.com/212d832ea4.js" crossorigin="anonymous"></script>
{{ $dataTable->scripts() }}
@endsection