<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StateCityController extends Controller
{
    public function state()
    {
        /*$data['states'] = State::get(["name","id"]);
        return view('auth.register',$data);*/

     //   $states=State::all();
     //   return view('auth.register',compact('states'));

    }

    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
            ->get(["name","id"]);
        return response()->json($data);
    }
}
