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
            <h3>{{ trans('admin.triad.edit') }} {{ $triad['triadName_'  .LaravelLocalization::getCurrentLocale()] }}</h3>
            {!! Form::model($triad, ['method'=>'PATCH', 'action'=>['TriadController@update', $triad->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label(trans('admin.triad.name_ar')) !!}
                    {!! Form::text('triadName_ar', null, ['class'=>'form-control']) !!}
                </div>
                @error('triadName_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.triad.name_en')) !!}
                    {!! Form::text('triadName_en', null, ['class'=>'form-control']) !!}
                </div>
                @error('triadName_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    {!! Form::label(trans('admin.triad.icon')) !!}
                    <br>
                    <img src="{{ checkImage($triad->icon, 'imagesTriads') }}" alt="" width="100px" height="100px">
                    {!! Form::file('icon',  ['class'=>'form-control']) !!}
                </div>
                @error('icon')
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
