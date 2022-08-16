<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=City::all();
        return  view('admin.city.all',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::all();
        $states=State::all();
        return view('admin.city.create',compact('city','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city'=>'required|unique:cities,name',
            'state'=>'required'
        ]);


        City::create(
            [
                'name' => $request->city,
                'state_id'=>$request->state
            ]
        );


        $city=City::all();
        //$states=State::all();
        toast()->success('شهر جدید اضافه شد');
        return view('admin.city.all',compact('city'));
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
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states=State::all();
        return view('admin.city.edit',compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'city'=>['required',
                    Rule::unique('cities','name')->ignore($city->id)
                ],
            'state'=>'required'
        ]);


        $city->update(
            [
                'name' => $request->city,
                'state_id'=>$request->state
            ]
        );


        $city=City::all();
        //$states=State::all();
        toast()->success('ویرایش انجام شد');
        return view('admin.city.all',compact('city'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        toast()->success('حذف انجام شد');
        //$states=State::all();
        $city=City::all();
        return view('admin.city.all',compact('city'));
    }
}
