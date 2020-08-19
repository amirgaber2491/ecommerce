<?php

namespace App\Http\Controllers;

use App\DataTables\CountryDataTables;
use App\Http\Requests\AddNewCountryRequest;
use App\Http\Requests\EditCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTables $dataTable)
    {
        return $dataTable->render('admin.countries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewCountryRequest $request)
    {
        if ($request->has('logo')){
            $input = $request->all();
            $input['logo'] = $name = imageUpload($request->file('logo'), 'imagesCountries');
            Country::create($input);
            return redirect()->back()->with(['success'=>trans('admin.country.add.success')]);
        }
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
        $country = Country::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( EditCountryRequest $request, $id)
    {
        $country = Country::find($id);
        $input = $request->all();
        if ($request->has('logo')){
            checkImageDelete('imagesCountries', $country->logo);
            $input['logo'] = $name = imageUpload($request->file('logo'), 'imagesCountries');
        }
        $country->update($input);
        return redirect()->back()->with(['success'=>trans('admin.country.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        checkImageDelete('imagesCountries', $country->logo);
        $country->delete();
        return  redirect()->back()->with(['success'=>trans('admin.country.delete.success')]);
    }
    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.country.delete.multi.success';
        }else{
            $transDelete = 'admin.country.delete.success';
        }
        foreach ($request->ids as $id){
            $country = Country::find($id);
            checkImageDelete('imagesCountries', $country->logo);
        }
        Country::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }
}
