@extends('layouts.adminlte')

@section('title', 'medicine')

@section('content')

      


            <table id="myTable">
                <thead>
                    <tr>
                        <th>Medicine ID</th>
                        <th>price (in cents)</th>
                        <th>descreption</th>
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
    $(document).ready(function(){
        $('#myTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true
        });
    });
</script>
@endsection 