<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Natije;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AzmoonController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:questioins,user','can:azmoon,azmoon']);
        // $this->middleware(['can:question-create,user'])->only(['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions =Question::paginate(3);
        return  view('admin.questions.allSoal',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.questions.createSoal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->validate(
            [
                'q_name' =>'required',
                'j1' => 'required',
                'j2' => 'required',
                'j3' => 'required',
                'j4'=>'required',
                'j_d'=>'required',
                'zaman'=>'required'
            ]
        );

        $soal =Question::create($data);

        $questions=Question::paginate(3);
        toast()->success('سوال جدید با موفقیت ایجاد شد');
       // return back();
        return  view('admin.questions.allSoal',compact('questions'));
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
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::find($id);
        return  view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'q_name' => 'required',
                'j1' => 'required',
                'j2' => 'required',
                'j3' => 'required',
                'j4'=>'required',
                'j_d'=>'required',
                'zaman'=>'required'
            ]
        );

        Question::where('id',$id)->update([
            'q_name' =>$request->q_name,
            'j1' => $request->j1,
            'j2' =>$request->j2 ,
            'j3' => $request->j3,
            'j4'=>$request->j4,
            'j_d'=>$request->j_d,
            'zaman'=>$request->zaman
        ]);

        toast()->success('ویرایش انجام شد');
        return back();
      // $questions=Question::paginate(3);
       // return view('admin.questions.allSoal',compact('questions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::where('id',$id)->delete();
        toast()->success('حذف انجام شد');
        return back();
    }

    public function karname()
    {
        $users=User::all();
        return  view('admin.azmoon.karname',compact('users'));
    }

    public function karnameUser(User $user)
    {
        $natije=Natije::where('user_id',$user->id)->get();
        $user=User::where('id',$user->id)->get();
        return  view('admin.azmoon.karnameUser',compact('user','natije'));
    }

    public function karnameUserDelete(User $user)
    {
        Natije::where('user_id',$user->id)->delete();
        toast()->info('حذف انجام شد');
        return back();
    }
}
