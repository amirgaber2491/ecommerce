@extends('admin.layouts.master')
@php
    if (!empty(old('lat'))){
        $lat = '1';
        $lat =  old('lat');
    }elseif ($mall->lat != ''){
        $lat = $mall->lat;
    }else{
          $lat = '30.06277690073326';
    }

if (!empty(old('lang'))){
    $lang =  old('lang');
}elseif ($mall->lang != ''){
    $lang = $mall->lang;
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
            <h3>{{ trans('admin.mall.edit') }} {{ $mall['name_' . LaravelLocalization::getCurrentLocale()] }}</h3>
            {!! Form::model($mall, ['method'=>'PATCH', 'action'=>['MallController@update', $mall->id], 'files'=>true]) !!}
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
                    {!! Form::label(trans('admin.mall.contact')) !!}
                    {!! Form::text('contact_name', null, ['class'=>'form-control']) !!}
                </div>
                @error('contact_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.email')) !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
                @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.mobile')) !!}
                    {!! Form::text('mobile', null, ['class'=>'form-control']) !!}
                </div>
                @error('mobile')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.country')) !!}
                    {!! Form::select('country_id', $country, null, ['class'=>'form-control']) !!}
                </div>
                @error('country_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.address')) !!}
                    {!! Form::text('address', null, ['class'=>'form-control address']) !!}
                </div>
                <div class="form-group">
                    <div id="us1" style="width: 100%; height: 400px;"></div>
                    {!! Form::hidden('lat', $lat, ['id'=>'lat']) !!}
                    {!! Form::hidden('lang', $lang, ['id'=>'lang']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label(trans('admin.facebook')) !!}
                    {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
                </div>
                @error('facebook')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.twitter')) !!}
                    {!! Form::text('twitter', null, ['class'=>'form-control']) !!}
                </div>
                @error('twitter')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    {!! Form::label(trans('admin.mall.icon')) !!}
                    <br>
                    <img src="{{ checkImage($mall->icon, 'imagesMalls') }}" alt="" width="100px" height="100px">
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
            },
            enableAutocomplete: true

        });
        console.log({{ $lat }})
        console.log({{ $lang }})
    </script>

@stop
