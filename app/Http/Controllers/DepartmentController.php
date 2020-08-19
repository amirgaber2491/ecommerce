<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use function Matrix\trace;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.departments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        $input = $request->all();
        if ($request->has('icon')){
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesDepartments');
        }
        Department::create($input);
        return redirect()->back()->with(['success'=>trans('admin.department.add.success')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'test';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $input = $request->all();
        if ($input['parent_id'] < 1){
            $input['parent_id'] = null;
        }
        if ($request->has('icon')){
            checkImageDelete('imagesDepartments', $department->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesDepartments');
        }
        $department->update($input);
        return redirect()->back()->with(['success'=>trans('admin.department.edit.success')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        checkImageDelete('imagesDepartments', $department->icon);
        if ($department->parent){
            foreach ($department->parent as $item) {
                checkImageDelete('imagesDepartments', $item->icon);
            }
        }
        $department->delete();
        return redirect()->back()->with(['success'=>trans('admin.department.delete')]);
    }
}
