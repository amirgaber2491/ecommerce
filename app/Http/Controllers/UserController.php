<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDataTables;
use App\DataTables\UserDataTables;
use App\Http\Requests\AddNewUserRequest;
use App\Http\Requests\EditAdminRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserDataTables $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewUserRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        User::create($data);
        return redirect()->back()->with(['success'=>trans('admin.ms.su.add.user')]);
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        if ($request->input('password') == ''){
            $data = $request->except('password');
        }else{
            $data = $request->all();
            $data['password'] = Hash::make($request->input('password'));
        }
        User::find($id)->update($data);
        return redirect()->back()->with(['success'=>trans('admin.ms.su.edit.user')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with(['success'=>trans('admin.user.delete.success')]);
    }
    public function deleteMulti(Request $request){
        if (count($request->ids) > 1){
            $transDelete = 'admin.user.delete.multi.success';
        }else{
            $transDelete = 'admin.user.delete.success';
        }
        User::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }

}
