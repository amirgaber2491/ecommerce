<?php

namespace App\Http\Controllers;

use App\DataTables\CityDataTables;
use App\Http\Requests\AddNewCityRequest;
use App\Http\Requests\EditCityRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDataTables $dataTable)
    {
        return $dataTable->render('admin.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::pluck('countryName_' .LaravelLocalization::getCurrentLocale(), 'id');
        return view('admin.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewCityRequest $request)
    {
        $country = Country::findOrFail($request->country_id);
        $country->cities()->create([
            'cityName_ar'=>$request->input('cityName_ar'),
            'cityName_en'=>$request->input('cityName_en'),

        ]);
        return  redirect()->back()->with(['success'=>trans('admin.city.add.success')]);
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
        $city = City::findOrFail($id);
        $countries = Country::pluck('countryName_' .LaravelLocalization::getCurrentLocale(), 'id');
        return view('admin.cities.edit', compact('countries', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditCityRequest $request, $id)
    {
        City::find($id)->update([
            'cityName_ar'=>$request->input('cityName_ar'),
            'cityName_en'=>$request->input('cityName_en'),
            'country_id'=>$request->input('country_id')
        ]);
        return  redirect()->back()->with(['success'=>trans('admin.city.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        return redirect()->back()->with(['success'=>trans('admin.city.delete.success')]);
    }

    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.city.delete.multi.success';
        }else{
            $transDelete = 'admin.city.delete.success';
        }
        City::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);
    }
}
