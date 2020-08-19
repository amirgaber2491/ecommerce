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
            <h3>{{ $admin->name }} : {{ trans('admin.edit.admin') }}</h3>
            {!! Form::model($admin, ['method'=>'PATCH', 'action'=>['AdminController@update', $admin->id]]) !!}
            <div class="gorm-group">
                {!! Form::label(trans('admin.admin.name')) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="gorm-group">
                {!! Form::label(trans('admin.email')) !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="gorm-group">
                {!! Form::label(trans('admin.password')) !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="gorm-group">
                {!! Form::label(trans('admin.repeat.password')) !!}
                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
            </div>
            <div class="gorm-group">
                <br>
                {!! Form::submit(trans('admin.edit.admin'), ['class'=>'btn btn-primary']) !!}
            </div>

        </section>
    </div>
@stop
