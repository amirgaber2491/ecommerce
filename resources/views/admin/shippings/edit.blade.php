@extends('admin.layouts.master')
@php
    if (!empty(old('lat'))){
        $lat =  old('lat');
    }elseif ($shipping->lat != ''){
        $lat = $shipping->lat;
    }else{
          $lat = '30.06277690073326';
    }

if (!empty(old('lang'))){
    $lang =  old('lang');
}elseif ($shipping->lang != ''){
    $lang = $shipping->lang;
}else{
    $lang = '31.269337654113762';
}

@endphp
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
            <h3>{{ trans('admin.shipping.edit') }} {{ $shipping['name_' . LaravelLocalization::getCurrentLocale()] }}</h3>
            {!! Form::model($shipping, ['method'=>'PATCH', 'action'=>['ShippingController@update', $shipping->id], 'files'=>true]) !!}
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
                    {!! Form::label(trans('admin.company.owner')) !!}
                    {!! Form::select('company_id', $company, null, ['class'=>'form-control']) !!}
                </div>
                @error('company_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    <div id="us1" style="width: 100%; height: 400px;"></div>
                    {!! Form::hidden('lat', $lat, ['id'=>'lat']) !!}
                    {!! Form::hidden('lang', $lang, ['id'=>'lang']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label(trans('admin.shipping.icon')) !!}
                    <br>
                    <img src="{{ checkImage($shipping->icon, 'imagesShippings') }}" alt="" width="100px" height="100px">
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
@section('footer')
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyA9_ve_oT3ynCaAF8Ji4oBuDjOhWEHE92U'></script>
    <script src="{{ asset('js/locationpicker.jquery.js') }}"></script>
    <script type="text/javascript">
        $('#us1').locationpicker({
            location: {
                latitude: {{ $lat }},
                longitude: {{ $lang }}
            },
            radius: 300,
            markerIcon: '{{ asset('admin/images/map-marker-2-xl.png') }}',
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#lang'),
                // radiusInput: $('#us2-radius'),
                locationNameInput: $('.address')
            }

        });
    </script>

@stop
