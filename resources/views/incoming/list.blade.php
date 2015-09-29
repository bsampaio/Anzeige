@extends('layouts.sbadmin.base')

@section('title', 'Incomings List')

@section('custom-css')
<!-- DataTables CSS -->

<link rel="stylesheet" href="/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"></link>

<!-- DataTables Responsive CSS -->

<link rel="stylesheet" href="/datatables-responsive/css/dataTables.responsive.css"></link>
@endsection

@section('content')

    @section('primary-title', 'Incomings List')
    <table id='incomings' class='table table-striped table-bordered table-hover'>
        <thead>
            <th>ID</th>
            <th>Type</th>
            <th>Due Date</th>
            <th>Value</th>
            <th>Paid Date</th>
        </thead>
        <tbody>
            @foreach($incomings as $incoming)
            <tr>
                <td>{{$incoming->id}}</td>
                <td>{{$incoming->type->value}}</td>
                <td>{{$incoming->due_date}}</td>
                <td>{{$incoming->value}}</td>
                <td>{{$incoming->paid_date}}</td>
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
        $('#incomings').DataTable({
                responsive: true
        });
        $('#incomings tbody').on('dblclick', 'tr', function(){
            var pid = $(this).children().first().text();
            pid = parseInt(pid);
            if(typeof pid == 'number')
                window.location.href = "{{url('/incoming')}}/"+pid;
        });
    });
    
</script>
@endsection
