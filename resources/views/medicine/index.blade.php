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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                        <tr>
                            <td>1</td>
                            <td>panadol</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                            <td>
                                <a href="{{ route('medicines.edit',1) }}" title="Edit"><i
                                        class="fa-solid fa-pen-to-square pl-4 "></i></a>
                                <a href="#" title="Delete"><i class="fa-sharp fa-solid fa-trash black pr-4"></i></a>
            
                            </td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>nerovit</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                            <td>
                                <a href="{{ route('medicines.edit',1) }}" title="Edit"><i
                                        class="fa-solid fa-pen-to-square pl-4 "></i></a>
                                <a href="#" title="Delete"><i class="fa-sharp fa-solid fa-trash black pr-4"></i></a>
            
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>comtrex</td>
                            <td>jrjtrtjtj</td>
                            <td>jrrtjrtjrtjtrjrtjtrj</td>
                            <td>
                                <a href="{{ route('medicines.edit',1) }}" title="Edit"><i
                                        class="fa-solid fa-pen-to-square pl-4 "></i></a>
                                <a href="#" title="Delete"><i class="fa-sharp fa-solid fa-trash black pr-4"></i></a>
            
                            </td>
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