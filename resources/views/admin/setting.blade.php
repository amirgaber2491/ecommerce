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

        <!-- Main content -->
        <section class="content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <h3>{{ trans('admin.setting') }}</h3>
            {!! Form::model($setting, ['method'=>'PATCH', 'action'=>'AdminController@updateSetting', 'files'=>true]) !!}
            <div class="gorm-group">
                {!! Form::label(trans('admin.siteName_ar')) !!}
                {!! Form::text('siteName_ar', $setting->siteName_ar, ['class'=>'form-control']) !!}
            </div>
            @error('siteName_ar')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteName_en')) !!}
                {!! Form::text('siteName_en', null, ['class'=>'form-control']) !!}
            </div>
            @error('siteName_en')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteEmail')) !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
            @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteLogo')) !!}
                <br>
                <img src="{{ checkImage($setting->logo, 'imagesSetting', 'logo.png') }}" alt="" width="100px">
                <br>
                {!! Form::file('logo', ['class'=>'form-control']) !!}
            </div>
            @error('logo')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteIcon')) !!}
                <br>
                <img src="{{ checkImage($setting->icon, 'imagesSetting', 'icon.png') }}" alt="" width="100px">
                <br>
                {!! Form::file('icon', ['class'=>'form-control']) !!}
            </div>
            @error('icon')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteMain_lang')) !!}
                {!! Form::select('main_lang', ['ar'=>trans('admin.siteAr'), 'en'=>trans('admin.siteEn')], null, ['class'=>'form-control']) !!}
            </div>
            @error('main_lang')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteDesc')) !!}
                {!! Form::textarea('desc', null, ['class'=>'form-control']) !!}
            </div>
            @error('desc')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteKeywords')) !!}
                {!! Form::textarea('keywords', null, ['class'=>'form-control']) !!}
            </div>
            @error('keywords')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteStatus')) !!}
                {!! Form::select('status', ['open'=>trans('admin.siteOpen'), 'close'=>trans('admin.siteClose')], null, ['class'=>'form-control']) !!}
            </div>
            @error('status')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror


            <div class="gorm-group">
                {!! Form::label(trans('admin.siteMsgSetting')) !!}
                {!! Form::textarea('message_siteSetting', null, ['class'=>'form-control']) !!}
            </div>
            @error('message_siteSetting')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                <br>
                {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-info']) !!}
            </div>
            {!! Form::close() !!}
        </section>
    </div>

@stop
