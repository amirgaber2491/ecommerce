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
            <h3>{{ trans('admin.add.user') }}</h3>
            {!! Form::open(['method'=>'POST', 'action'=>'UserController@store']) !!}
            <div class="gorm-group">
                {!! Form::label(trans('admin.user.name')) !!}
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
            <div class="form-group">
                {!! Form::label(trans('admin.membership.level') ) !!}
                {!! Form::select('level', ['user'=> trans('admin.level.user'), 'vendor'=> trans('admin.level.vendor'), 'company'=> trans('admin.level.company')], null, ['class'=>'form-control', 'placeholder'=> trans('admin.choose.level')]) !!}
            </div>
                @error('level')
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
                {!! Form::submit(trans('admin.add.user'), ['class'=>'btn btn-success']) !!}
            </div>

        </section>
    </div>
@stop
