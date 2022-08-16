<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class stateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param State $state
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states=State::all();
        return  view('admin.state.all',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        return view('admin.state.create',compact('states'));
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
            'state'=>'required|unique:states,name',
        ]);


           State::create(
               [
                   'name' => $request->state,
               ]
           );


        $states=State::all();
        $city=City::all();

        toast()->success('استان جدید اضافه شد');
        return view('admin.state.all',compact('states','city'));
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
     * @param State $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('admin.state.edit',compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param State $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $data=$request->validate([
            'state'=>['required',
                Rule::unique('states','name')->ignore($state->id)
            ]

        ]);

        $state->update(
            [
                'name'=>$request->state
            ]
        );

        $states=State::all();
        toast()->success('ویرایش انجام شد');
        return view('admin.state.all',compact('states'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return void
     */
    public function destroy(State $state)
    {
        $cityx=City::where('state_id',$state->id)->delete();
        $state->delete();
        toast()->success('حذف انجام شد');
        $states=State::all();
        return view('admin.state.all',compact('states'));
    }

    public function multiDelete(Request $request)
    {
        State::whereIn('id', $request->get('selected'))->delete();

        return response("موارد انتخاب شده با موفقیت حذف گردید", 200);
    }

}
