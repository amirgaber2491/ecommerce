<?php

namespace App\Http\Controllers;

use App\DataTables\TriadDataTables;
use App\Http\Requests\TriadRequest;
use App\Models\Triad;
use Illuminate\Http\Request;

class TriadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TriadDataTables $dataTable)
    {
        return $dataTable->render('admin.triads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.triads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TriadRequest $request)
    {
        $input = $request->all();
        if ($request->has('icon')){
            $input = $request->all();
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesTriads');
        }
        Triad::create($input);
        return redirect()->back()->with(['success'=>trans('admin.triad.add.success')]);
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
        $triad = Triad::findOrFail($id);
        return view('admin.triads.edit', compact('triad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TriadRequest $request, $id)
    {
        $triad = Triad::find($id);
        $input = $request->all();
        if ($request->has('icon')){
            checkImageDelete('imagesTriads', $triad->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesTriads');
        }
        $triad->update($input);
        return redirect()->back()->with(['success'=>trans('admin.triad.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $triad = Triad::find($id);
        checkImageDelete('imagesTriads', $triad->icon);
        $triad->delete();
        return redirect()->back()->with(['success'=>trans('admin.triad.delete.success')]);
    }

    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.triad.delete.multi.success';
        }else{
            $transDelete = 'admin.triad.delete.success';
        }
        foreach ($request->ids as $id){
            $country = Triad::find($id);
            checkImageDelete('imagesTriads', $country->icon);
        }
        Triad::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }

}
