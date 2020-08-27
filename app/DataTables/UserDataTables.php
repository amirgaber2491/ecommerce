<?php

namespace App\DataTables;

use App\AdminDataTable;
use App\User;
use Illuminate\Support\Str;
use Yajra\DataTables\Services\DataTable;

class UserDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', function ($model){
                $edit = '<a href="'. route('user.edit', $model->id) .'" class="btn btn-info">' . '<i class="fa fa-edit"></i>' . '</a>';
                return $edit;
            })
            ->addColumn('delete', function ($model){
                    $edit = "<form action='". route('user.destroy', $model->id) ."' method='POST'>".
                        "<input type='hidden' name='_method' value='DELETE'>". csrf_field() .
                        "<button type='submit' class='btn btn-danger'>". "<i class='fa fa-trash'></i>" ."</button>".
                        "</form>";
                    return $edit;
            })
            ->editColumn('created_at', function ($model){
                return $model->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function ($model){
                return $model->updated_at->format('Y-m-d');
            })
            ->addColumn('check', function ($model){
                return "<input class='checkedIds' name='ids[]' type='checkbox' value='" .  $model->id ."'>";

            })
            ->addColumn('level', function ($model){
                if ($model->level == 'user'){
                    return "<span class='btn btn-success'>". trans('admin.level.user') ."</span>";
                }
                if ($model->level == 'vendor'){
                    return "<span class='btn btn-primary'>". trans('admin.level.vendor') ."</span>";
                }
                if ($model->level == 'company'){
                    return "<spa class='btn btn-info'>". trans('admin.level.company') ."</spa>";
                }

            })
            ->rawColumns([
                'edit',
                'delete',
                'check',
                'level'
            ]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AdminDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
//        return $model->newQuery();
        return User::query()->where(function ($q){
            if (request()->has('level')){
                $q->where('level', request('level'));
            }
        });
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->addAction(['width' => '80px'])
            //->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[5,10, 25, 50, 100, -1], [5,10, 25, 50, trans('admin.all.record')]],
                'buttons'    => [
                    [
                        'text'      => '<i class="fa fa-plus"></i> '. trans('admin.create_user'),
                        'className' => 'btn btn-info mr-2',
                        'action'=>'function(){
                            window.location.href = "'. route('user.create') .'"
                        }',
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'

                    ],

                    [
                        'extend' => 'print',
                        'className' => 'btn btn-primary mr-2', 'text' => '<i class="fa fa-print"></i>',
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'
                    ],

                    [
                        'extend' => 'csv', 'className' => 'btn btn-info mr-2', 'text' => '<i class="fa fa-file"></i> '. Str::title(trans('admin.ex_csv')),
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'
                    ],
                    [
                        'extend' => 'excel', 'className' => 'btn btn-success mr-2', 'text' => '<i class="fa fa-file-excel-o"></i> '. Str::title(trans('admin.ex_excel')),
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'
                    ],
                    [
                        'extend' => 'reload', 'className' => 'btn btn-default mr-2', 'text' => '<i class="fa fa-refresh"></i>',
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'
                    ],

                    [
                        'text'      => "<i class='fa fa-trash'></i>",
                        'className' => 'btn btn-danger mr-2 deleteAll',
                        'init'=>'function(api, node, config){
                        $(node).removeClass("dt-button")
                        }'
                    ],

                ],
                'initComplete'=>"function () {
            this.api().columns([ 2, 3, 4]).every(function () {
                var column = this;
                var input = document.createElement(\"input\");
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }",
               'language'=> datatableLang()

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'  => 'check',
                'data'  => 'check',
                'title' => "<input type='checkbox' class='checkAll' onclick='check_all()' title>",
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => trans('admin.d_id'),
            ],
            [
                'name'  => 'name',
                'data'  => 'name',
                'title' => trans('admin.u_name'),
            ],
            [
                'name'  => 'email',
                'data'  => 'email',
                'title' => trans('admin.u_email'),
            ],
            [
                'name'  => 'level',
                'data'  => 'level',
                'title' => trans('admin.membership.level.table'),
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.d_created'),
            ],
            [
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.d_updated'),
            ],
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => trans('admin.d_edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => trans('admin.d_delete'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'UserDataTables_' . date('YmdHis');
    }
}
