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
            <a href="" class="btn btn-info edit_dep showbtn_control hidden"> <i class="fa fa-edit"></i> {{ trans('admin.edit') }} </a>
            <a href="" class="btn btn-danger delete_dep showbtn_control hidden" id="deleteDepartment"><i class="fa fa-trash"></i> {{ trans('admin.delete') }} </a>
            <div class="clearfix"></div>
            <div id="jstree"></div>
            <div class="clearfix"></div>

            <div class="modal fade" id="deleteAllModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="titleModel">{{ trans('admin.do.you.want.to.delete') }}<span id="modelText"></span> </h2>
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['method'=>'DELETE', 'id'=>'formDeleteDepartment']) !!}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.no') }}</button>
                            {!! Form::submit(trans('admin.yes'), ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('footer')
    <script src="{{ asset('admin/jstree/src/jstree.js') }}"></script>
    <script src="{{ asset('admin/jstree/src/jstree.wholerow.js') }}"></script>
    <script src="{{ asset('admin/jstree/src/jstree.checkbox.js') }}"></script>
    <script>
        $('#jstree').jstree({ 'core' : {
                'data' : {!! jsTree() !!},
                "themes" : {
                    "variant" : "large",
                    "rtl": true
                },
                "checkbox" : {
                    "keep_selected_style" : true
                },
                "plugins" : [ "wholerow", "checkbox" ]

        } });

        $('#jstree').on("changed.jstree", function (e, data) {
            var i, j, r = [];
            var name = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
                name.push(data.instance.get_node(data.selected[i]).text);
            }
            $('#formDeleteDepartment').attr('action', '{{  url(app()->getLocale().'/admin/department') }}/'+r.join(', '));
            $('#modelText').text(name.join(', ') + '{{ trans('admin.condition') }}');
            if (data.selected !== ''){
                $('.showbtn_control').removeClass('hidden');
                $('.edit_dep').attr('href', "{{ url('admin/department') }}/" + data.selected + '/edit');
            }else {
                $('.showbtn_control').addClass('hidden');
            }

        });
        $('#deleteDepartment').on('click', function (e){
            e.preventDefault()
            $('#deleteAllModel').modal('show');
        });


    </script>
@stop
