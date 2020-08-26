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
            <h3>{{ trans('admin.city.edit') }} {{ $city['cityName_' . LaravelLocalization::getCurrentLocale()] }}</h3>
            {!! Form::model($city, ['method'=>'PATCH', 'action'=>['CityController@update', $city->id]]) !!}
            <div class="form-group">
                {!! Form::label(trans('admin.city.name_ar')) !!}
                {!! Form::text('cityName_ar', null, ['class'=>'form-control']) !!}
            </div>
            @error('cityName_ar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.city.name_en')) !!}
                {!! Form::text('cityName_en', null, ['class'=>'form-control']) !!}
            </div>
            @error('cityName_en')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.city.choseCountry')) !!}
                {!! Form::select('country_id', $countries , null, ['class'=>'form-control', 'placeholder'=>'--------']) !!}
            </div>
            @error('country_id')
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
