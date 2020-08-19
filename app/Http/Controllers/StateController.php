<?php

namespace App\Http\Controllers;

use App\DataTables\StateDataTables;
use App\Http\Requests\AddNewStateRequest;
use App\Http\Requests\EditStateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTables $dataTable)
    {
        return $dataTable->render('admin.states.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create(Request  $request)
    {
        if ($request->ajax()){
            if ($request->has('country_id')){
                $old = $request->city_id ? $request->city_id : '';
                $cities = City::where('country_id', $request->country_id)->pluck('cityName_'. LaravelLocalization::getCurrentLocale(), 'id');
                return  \  Form::label(trans('admin.city.choseCity')).
                        \Form::select('city_id', $cities , $old , ['class'=>'form-control', 'placeholder'=>'----']);
            }

        }
        $countries = Country::has('cities')->pluck('countryName_' .LaravelLocalization::getCurrentLocale(), 'id');
        return view('admin.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddNewStateRequest $request)
    {
        State::create($request->all());
        return redirect()->back()->with(['success'=>trans('admin.state.add.success')]);
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
     * @return string
     */
    public function edit(Request $request, $id)
    {  if ($request->ajax()){
        if ($request->has('country_id')){
            $old = $request->city_id ? $request->city_id : '';
            $cities = City::where('country_id', $request->country_id)->pluck('cityName_'. LaravelLocalization::getCurrentLocale(), 'id');
            return  \  Form::label(trans('admin.city.choseCity')).
                \Form::select('city_id', $cities , $old , ['class'=>'form-control', 'placeholder'=>'----']);
        }

    }
        $countries = Country::has('cities')->pluck('countryName_' .LaravelLocalization::getCurrentLocale(), 'id');
    $state = State::findOrFail($id);
        return view('admin.states.edit', compact('countries', 'state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditStateRequest $request, $id)
    {
        State::find($id)->update($request->all());
        return redirect()->back()->with(['success'=>trans('admin.state.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        State::find($id)->delete();
        return redirect()->back()->with(['success'=>trans('admin.state.delete.success')]);
    }
    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.state.delete.multi.success';
        }else{
            $transDelete = 'admin.state.delete.success';
        }
        State::destroy($request->ids);
        return redirect()->back()->with(['success'=>$transDelete]);
    }
}
