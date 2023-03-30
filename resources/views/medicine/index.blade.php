@extends('layouts.adminlte')

@section('title', 'medicine')

@section('content')

      
<div class="text-center">
    <a href="{{route('medicines.create')}}" class="m-4 btn btn-success">Create medicine</a>
</div>

            <table id="myTable" class="table-striped">
                <thead>
                    <tr>
                        <th>Medicine ID</th>
                        <th>Medicine Name</th>
                        <th>Price (in cents)</th>
                        <th>Descreption</th>
                    </tr>
                </thead>
                <tbody>
                
                        <tr>
                            <td>1</td>
                            <td>panadol</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>nerovit</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>comtrex</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                        </tr>
                 
                </tbody>
            </table> 
@endsection    





@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true
        });
    });
</script>
@endsection 