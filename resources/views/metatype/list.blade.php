@extends('layouts.sbadmin.base')

@section('title', 'MetaTypes List')

@section('custom-css')
<!-- DataTables CSS -->

<link rel="stylesheet" href="/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"></link>

<!-- DataTables Responsive CSS -->

<link rel="stylesheet" href="/datatables-responsive/css/dataTables.responsive.css"></link>
@endsection

@section('content')

    @section('primary-title', 'MetaTypes List')
    <table id='metatypes' class='table table-striped table-bordered table-hover'>
        <thead>
            <th>ID</th>
            <th>Type</th>
            <th>Value</th>
        </thead>
        <tbody>
            @foreach($metaTypes as $metaType)
            <tr>
                <td>{{$metaType->id}}</td>
                <td>{{$metaType->type}}</td>
                <td>{{$metaType->value}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('custom-scripts')
<!--

 DataTables JavaScript 

-->

<script src="/datatables/media/js/jquery.dataTables.min.js"></script>

<script src="/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#metatypes').DataTable({
                responsive: true
        });
    });
    
</script>
@endsection
