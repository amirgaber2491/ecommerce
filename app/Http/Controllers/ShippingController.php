<?php

namespace App\Http\Controllers;

use App\DataTables\ShippingDataTables;
use App\Http\Requests\ShippingRequest;
use App\Models\Shipping;
use App\User;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDataTables $dataTables)
    {
        return $dataTables->render('admin.shippings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $company = User::where('level', 'company')->pluck('name', 'id');
        return view('admin.shippings.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShippingRequest $request)
    {
        $input = $request->all();
        if ($request->has('icon')){
            $input['icon'] = imageUpload($request->file('icon'), 'imagesShippings');
        }
        Shipping::create($input);
        return redirect()->back()->with(['success'=>trans('admin.shipping.add.success')]);
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
        $shipping = Shipping::findOrFail($id);
        $company = User::where('level', 'company')->pluck('name', 'id');
        return view('admin.shippings.edit', compact('shipping', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShippingRequest $request, $id)
    {
        $shipping = Shipping::find($id);
        $input = $request->all();
        if ($request->has('icon')){
            checkImageDelete('imagesShippings', $shipping->icon);
            $input['icon'] = $name = imageUpload($request->file('icon'), 'imagesShippings');
        }
        $shipping->update($input);
        return redirect()->back()->with(['success'=>trans('admin.shipping.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        checkImageDelete('imagesShippings', $shipping->icon);
        $shipping->delete();
        return  redirect()->back()->with(['success'=>trans('admin.shipping.delete.success')]);
    }

    public function deleteMulti(Request $request)
    {
        if (count($request->ids) > 1){
            $transDelete = 'admin.shipping.delete.multi.success';
        }else{
            $transDelete = 'admin.shipping.delete.success';
        }
        foreach ($request->ids as $id){
            $shipping = Shipping::find($id);
            checkImageDelete('imagesShippings', $shipping->icon);
        }
        Shipping::destroy($request->ids);
        return redirect()->back()->with(['success'=>trans($transDelete)]);

    }
}
