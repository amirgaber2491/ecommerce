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
            <h3>{{ trans('admin.country.edit')}} {{ $country['countryName_' . LaravelLocalization::getCurrentLocale()]  }}</h3>
            {!! Form::model($country, ['method'=>'POST', 'action'=>['CountryController@update', $country->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label(trans('admin.country.name_ar')) !!}
                {!! Form::text('countryName_ar', null, ['class'=>'form-control']) !!}
            </div>
            @error('countryName_ar')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.country.name_en')) !!}
                {!! Form::text('countryName_en', null, ['class'=>'form-control']) !!}
            </div>
            @error('countryName_en')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.country.choseCode')) !!}
                {!! Form::text('code', null, ['class'=>'form-control']) !!}
            </div>
            @error('code')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.country.mob')) !!}
                {!! Form::text('mob', null, ['class'=>'form-control']) !!}
            </div>
            @error('mob')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                {!! Form::label(trans('admin.country.logo')) !!}
                <br>
                <img src="{{ checkImage($country->logo, 'imagesCountries') }}" alt="" width="100px" height="100px">
                {!! Form::file('logo',  ['class'=>'form-control']) !!}
            </div>
            @error('logo')
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
