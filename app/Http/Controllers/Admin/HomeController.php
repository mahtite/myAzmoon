<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','auth.admin']);
    }

    public function index()
    {
        $user=Auth::user();
        $user=User::where('id',$user->id)->first();
        return view('admin.index',compact('user'));
    }

}
