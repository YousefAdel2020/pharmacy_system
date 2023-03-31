@extends('layouts.adminlte')

@section('title', 'medicine')

@section('content')




      
<div class="text-center">
    <a href="{{route('medicines.create')}}" class="m-4 btn btn-success">Create medicine</a>
</div>

{{ $dataTable->table() }}

@endsection    





@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true,
        });
    });
</script>

{{ $dataTable->scripts() }}
@endsection 