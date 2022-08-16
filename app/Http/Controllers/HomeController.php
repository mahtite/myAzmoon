<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Natije;
use App\Models\Question;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('azmoon');
    }

    public function index()
    {
        return view('index');
    }

    public function azmoon()
    {
        return view('azmoon');
    }

    public function postAzmoon()
    {
        $natije=Natije::where('user_id',auth()->user()->id)->get();
        if(count($natije)==0)
        {
            $questions = Question::select("*")->inRandomOrder()->get();
            return view('azmoon2', compact('questions'));
        }
        else
        {
            toast()->error('شما قبلا در این آزمون شرکت کرده اید!');
            return back();
        }
    }

    public function azmoon3(Request $request)
    {
        $natije=Natije::where('user_id',auth()->user()->id)->get();
        if(count($natije)==0) {
            return view('azmoon3');
        }
        else
        {
            toast()->error('شما قبلا در این آزمون شرکت کرده اید!');
            return back();
        }
    }
}
