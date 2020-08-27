@extends('admin.layouts.master')
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
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <h3>{{ trans('admin.color.add') }}</h3>
            {!! Form::open(['method'=>'POST', 'action'=>'ColorController@store', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label(trans('admin.name_ar')) !!}
                    {!! Form::text('name_ar', null, ['class'=>'form-control']) !!}
                </div>
                @error('name_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.name_en')) !!}
                    {!! Form::text('name_en', null, ['class'=>'form-control']) !!}
                </div>
                @error('name_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.color')) !!}
                    {!! Form::color('color', null, ['class'=>'form-control']) !!}
                </div>
                @error('color')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}

        </section>
    </div>
@stop

