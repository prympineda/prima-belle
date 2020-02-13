@extends('layouts.master-admin')

@section('title') Activity Logs @endsection

@section('custom-css')
<link href="{{ asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>Activity Logs</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Date and Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity_logs as $al)
                            <tr>
                               <td> {{$al->user->name}} </td>
                               <td> {{$al->action}} </td>
                               <td> {{$al->created_at}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('custom-js')
<script src="{{ asset('dashboard/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection