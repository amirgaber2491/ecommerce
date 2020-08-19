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
            <h3>{{ trans('admin.state.add') }}</h3>
            {!! Form::open(['method'=>'POST', 'action'=>'StateController@store']) !!}
                <div class="form-group">
                    {!! Form::label(trans('admin.state.name_ar')) !!}
                    {!! Form::text('stateName_ar', null, ['class'=>'form-control']) !!}
                </div>
                @error('stateName_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.state.name_en')) !!}
                    {!! Form::text('stateName_en', null, ['class'=>'form-control']) !!}
                </div>
                @error('stateName_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.city.choseCountry')) !!}
                    {!! Form::select('country_id', $countries , null, ['class'=>'form-control', 'placeholder'=>'--------', 'id'=>'country_id']) !!}
                </div>
                @error('country_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group" id="ex" style="display: none">
                    <div id="states">

                    </div>
                    @error('city_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error')}}
                    </div>
                @endif



                <div class="form-group">
                    {!! Form::submit(trans('admin.save'), ['class'=>'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}

        </section>
    </div>
@stop

@section('footer')
    <script>

        if ($('#country_id').val() > 0){
            $.ajax({
                url:'{{ route('state.create') }}',
                type:'get',
                data: {country_id:$('#country_id').val(), city_id:'{{ old('city_id') }}'},
                success:function(data) {
                    $("#ex").show();
                $("#states").html(data);
                }
            });
        }

    $(document).on('change', '#country_id',function (){
        if ($('#country_id').val() > 0){

        $.ajax({
        url:'{{ route('state.create') }}',
        type:'get',
        data: {country_id:$('#country_id').val()},
        success:function(data) {
        $("#ex").show();
        $("#states").html(data);
        }
        });
        }else {
        $('#ex').hide()
        }
    });
    </script>

@stop
