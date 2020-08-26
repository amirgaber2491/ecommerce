<?php

namespace App\Http\Controllers;

use App\DataTables\ManuFactDataTables;
use App\Http\Requests\ManufactRequest;
use App\Models\Manufact;
use Illuminate\Http\Request;

class ManufactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManuFactDataTables $dataTables)
    {
        return $dataTables->render('admin.manufacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.manufacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ManufactRequest $request)
    {
        $input = $request->all();
        if ($request->has('icon')){
            $input['icon'] = imageUpload($request->file('icon'), 'imagesManufacts');
        }
        Manufact::create($input);
        return redirect()->back()->with(['success'=>trans('admin.manufact.add.success')]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $manufact = Manufact::findOrFail($id);
        return view('admin.manufacts.edit', compact('manufact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ManufactRequest $request, $id)
    {
        $manufact = Manufact::find($id);
        $input = $request->all();
        if ($request->has('icon')){
            checkImageDelete('imagesManufacts', $manufact->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesManufacts');
        }
        $manufact->update($input);
        return redirect()->back()->with(['success'=>trans('admin.mainfact.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $manufact = Manufact::find($id);
        checkImageDelete('imagesManufacts', $manufact->icon);
        $manufact->delete();
        return  redirect()->back()->with(['success'=>trans('admin.mainufact.delete.success')]);
    }
    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.mainufact.delete.multi.success';
        }else{
            $transDelete = 'admin.mainufact.delete.success';
        }
        foreach ($request->ids as $id){
            $manufact = Manufact::find($id);
            checkImageDelete('imagesManufacts', $manufact->icon);
        }
        Manufact::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }

}
