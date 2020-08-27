<?php

namespace App\Http\Controllers;

use App\DataTables\MallDataTables;
use App\Http\Requests\MallRequest;
use App\Models\Country;
use App\Models\Mall;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MallDataTables $dataTables)
    {
        return $dataTables->render('admin.malls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
         $country = Country::pluck('countryName_' . LaravelLocalization::getCurrentLocale(), 'id');
        return view('admin.malls.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MallRequest $request)
    {
        $input = $request->all();
        if ($request->has('icon')){
            $input['icon'] = imageUpload($request->file('icon'), 'imagesMalls');
        }
        Mall::create($input);
        return redirect()->back()->with(['success'=>trans('admin.mall.add.success')]);
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
        $country = Country::pluck('countryName_' . LaravelLocalization::getCurrentLocale(), 'id');
        $mall = Mall::findOrFail($id);
        return view('admin.malls.edit', compact('country', 'mall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MallRequest $request, $id)
    {
        $mall = Mall::find($id);
        $input = $request->all();
        if ($request->has('icon')){
            checkImageDelete('imagesMalls', $mall->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesMalls');
        }
        $mall->update($input);
        return redirect()->back()->with(['success'=>trans('admin.mall.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $mall = Mall::find($id);
        checkImageDelete('imagesMalls', $mall->icon);
        $mall->delete();
        return  redirect()->back()->with(['success'=>trans('admin.mall.delete.success')]);
    }

    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.mall.delete.multi.success';
        }else{
            $transDelete = 'admin.mall.delete.success';
        }
        foreach ($request->ids as $id){
            $mall = Mall::find($id);
            checkImageDelete('imagesMalls', $mall->icon);
        }
        Mall::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }
}
