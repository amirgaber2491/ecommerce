<?php


use App\Models\Department;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function datatableLang()
{
    $langJsone = [
        "sEmptyTable"       => trans('datatables.sEmptyTable'),
        "sInfo"             => trans('datatables.sInfo'),
        "sInfoEmpty"        => trans('datatables.sInfoEmpty'),
        "sInfoFiltered"     => trans('datatables.sInfoFiltered'),
        "sInfoPostFix"      => trans('datatables.sInfoPostFix'),
        "sInfoThousands"    => trans('datatables.sInfoThousands'),
        "sLengthMenu"       => trans('datatables.sLengthMenu'),
        "sLoadingRecords"   => trans('datatables.sLoadingRecords'),
        "sProcessing"       => trans('datatables.sProcessing'),
        "sSearch"           => trans('datatables.sSearch'),
        "sZeroRecords"      => trans('datatables.sZeroRecords'),
        "oPaginate"=> [
            "sFirst"    => trans('datatables.sFirst'),
            "sPrevious" => trans('datatables.sPrevious'),
            "sNext"     => trans('datatables.sNext'),
            "sLast"     => trans('datatables.sLast')
        ],
        "oAria"=> [
            "sSortAscending"    => trans('datatables.sSortAscending'),
            "sSortDescending"   => trans('datatables.sSortDescending')
        ]
    ];
    return$langJsone;
}

function menuClassActive($numSegment , $nameSegment)
{
    return request()->segment($numSegment) == $nameSegment ? 'active' : '';
}


function itemClassActive($routeName, $routeParameter = null)
{
    return \request()->fullUrl() == route($routeName, $routeParameter) ? 'active' : '';
}
function imageUpload($data, $dir)
{
    $name = time() . '.' . $data->getClientOriginalExtension();
    $data->move('images/' . $dir, $name);
    return $name;
}

function checkImage($data, $dirImage, $defaultImage = null)
{
    if ($data){
        return asset('/images/' . $dirImage . '/'. $data);
    }else{
        return asset('images/ImagesDefault/' . $defaultImage);
    }
}

function checkImageDelete($dir, $name)
{
    if (public_path() . '/images/' . $dir . $name){
         File::delete(public_path() . '/images/' . $dir . '/' . $name);
    }
}

function setting()
{
    return Setting::first();
}

function jsTree($select = null, $dep_hide = null, $restor = false)
{
    $departments = Department::all();
    $dep_arr = [];
    foreach ($departments as $department) {
        $list_arr = [];
        $list_arr['logo'] = '';
        $list_arr['li_attr'] = '';
        $list_arr['a_attr'] = '';
        $list_arr['children'] = [];
        if ($select !== null && $select == $department->id){
            $list_arr['state'] = [
                'opened'=>true,
                'selected'=>true,
                'disabled'=>false
            ];
        }
        if ($dep_hide !== null && $dep_hide == $department->id){
            $list_arr['state'] = [
                'opened'=>false,
                'selected'=>false,
                'disabled'=>true,
                'hidden'=>true
            ];
        }


        $list_arr['id'] = $department->id;
        $list_arr['parent'] = $department->parent_id !== null ? $department->parent_id : '#';
        $list_arr['text'] = $department['dep_name_' .LaravelLocalization::getCurrentLocale()];
        $test = ['id'=>'0', 'parent'=>'#', 'text'=>trans('admin.main')];
        array_push($dep_arr, $list_arr);
    }
    if ($restor){
        array_unshift($dep_arr, $test);
    }

    return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
}
