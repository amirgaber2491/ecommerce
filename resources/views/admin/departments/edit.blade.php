@extends('admin.layouts.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('admin/jstree/src/themes/default/style.css') }}">
@stop
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
        <section class="content" style="{{ app()->getLocale() =='ar' ? "direction: rtl;":''  }}">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <h3>{{ trans('admin.department.edit') }} {{ $department['dep_name_'  .LaravelLocalization::getCurrentLocale()] }}</h3>
            {!! Form::model($department,['method'=>'PATCH', 'action'=>['DepartmentController@update', $department->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label(trans('admin.department.name_ar')) !!}
                    {!! Form::text('dep_name_ar', null, ['class'=>'form-control']) !!}
                </div>
                @error('dep_name_ar')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.department.name_en')) !!}
                    {!! Form::text('dep_name_en', null, ['class'=>'form-control']) !!}
                </div>
                @error('dep_name_en')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="clearfix"></div>
                <div id="jstree"></div>
                <div class="clearfix"></div>
                <input type="hidden" name="parent_id" class="parent_id" value="{{ old('parent_id') }}">
                <div class="form-group">
                    {!! Form::label(trans('admin.description')) !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                </div>
                @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.keywords')) !!}
                    {!! Form::textarea('keyword', null, ['class'=>'form-control']) !!}
                </div>
                @error('keyword')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    {!! Form::label(trans('admin.department.icon')) !!}
                    <br>
                    <img src="{{ checkImage($department->icon, 'imagesDepartments') }}" alt="" width="100" height="100px">
                    <br>
                    {!! Form::file('icon', ['class'=>'form-control']) !!}
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
    <script src="{{ asset('admin/jstree/src/jstree.js') }}"></script>
    <script src="{{ asset('admin/jstree/src/jstree.wholerow.js') }}"></script>
    <script src="{{ asset('admin/jstree/src/jstree.checkbox.js') }}"></script>
    <script>
        $('#jstree').jstree({ 'core' : {
                'data' : {!! jsTree($department->parent_id, $department->id, true) !!},
                "themes" : {
                    "variant" : "large",
                    "rtl": true
                },
                "checkbox" : {
                    "keep_selected_style" : true
                },
                "plugins" : [ "wholerow", "checkbox" ]

            } });
        $('#jstree').on('changed.jstree', function (e, data) {
            var i, j, r = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('.parent_id').val( r.join(', '));
        })

    </script>
@stop
