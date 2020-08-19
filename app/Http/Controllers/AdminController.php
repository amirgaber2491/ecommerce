<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDataTables;
use App\Http\Requests\AddNewAdminRequest;
use App\Http\Requests\EditAdminRequest;
use App\Http\Requests\SettingRequest;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminDataTables $dataTable)
    {
        return $dataTable->render('admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewAdminRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        Admin::create($data);
        return redirect()->back()->with(['success'=>trans('admin.ms.su.add.admin')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminRequest $request, $id)
    {
        if ($request->input('password') == ''){
            $data = $request->except('password');
        }else{
            $data = $request->all();
            $data['password'] = Hash::make($request->input('password'));
        }
        Admin::find($id)->update($data);
        return redirect()->back()->with(['success'=>trans('admin.ms.su.edit.admin')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->back()->with(['success'=>trans('admin.admin.delete.success')]);
    }
    public function deleteMulti(Request $request){
        if (count($request->ids) > 1){
            $transDelete = 'admin.admin.delete.multi.success';
        }else{
            $transDelete = 'admin.admin.delete.success';
        }
        Admin::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }

    public function editSetting()
    {
         $setting = Setting::first();
        return view('admin.setting', compact('setting'));
    }

    public function updateSetting(SettingRequest $request)
    {
        $input = $request->all();
        $setting = Setting::first();
        if ($request->has('logo')){
            checkImageDelete('imagesSetting', $setting->logo);
            $input['logo'] = $name = imageUpload($request->file('logo'), 'imagesSetting');
        }
        if ($request->has('icon')){
             checkImageDelete('imagesSetting', $setting->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesSetting');
        }
        $setting->update($input);
        return redirect()->back()->with(['success'=>trans('admin.update.setting')]);
    }

}
