@extends('admin.layouts.master')

@section('title', 'adminPanel')
@section('header')
{{--    <link rel="stylesheet" href="{{ asset('admin/rtl/plugins/datatables/dataTables.bootstrap.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/datatables.net-bs/css/buttons.dataTables.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('admin/ltr/bower_components/datatables.net-bs/css/dataTables.buttons.css') }}">--}}
    <style>


    </style>
@stop
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            @if(Session::has('success'))
                <h3>
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                </h3>
            @endif
            {!! Form::open(['method'=>'DELETE', 'action'=>'ManufactController@deleteMulti', 'id'=>'formData']) !!}
            {!! $dataTable->table(['class'=>'table table-bordered table-hover', 'id'=>'adminData'], true) !!}
            {!! Form::close() !!}
        </section>
    </div>
    @include('admin.includes.modelAdminDelete')
@stop
@section('footer')
{{--    <script src="{{ asset('admin/rtl/plugins/datatables/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ asset('admin/rtl/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>--}}
    <script src="{{ asset('admin/ltr/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/ltr/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/ltr/bower_components/datatables.net-bs/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('admin/ltr/bower_components/datatables.net-bs/js/dataTablesMain.js') }}"></script>


@stop

