<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Natije;
use App\Models\ProfileUser;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function home()
    {
        $user=Auth::user();
        $user=User::where('id',$user->id)->first();
        return view('profile.home',compact('user'));
    }

    public function download()
    {
       /* $filePath = public_path("myFile");
        $headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';

        return response()->download($filePath, $fileName, $headers);*/


        $data = [
            'title' => 'Welcome to Test',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('test.pdf');
    }

    public function twofactorauth()
    {
        return view('profile.twoFactore');
    }

    public function sendtwofactorauth(Request $request)
    {
        $data=$request->validate([
            'type'=>'required|in:off,sms',
            'phone'=>['required_unless:type,off',Rule::unique('users','phone')->ignore($request->user()->id)]
        ]);
        //return back();

        if($data['type']=='sms')
        {

            if($request->user()->phone != $data['phone'])
            {
                $code=ActiveCode::generateCode($request->user());
                $request->session()->flash('phone',$data['phone']);
               // return $code;

                return redirect(route('phoneVerify'));
            }
            else
            {
                $request->user()->update([
                    'twofactortype' => 'sms'
                ]);
            }

            return back();
        }

        if($data['type']=='off'){
            $request->user()->update([
                'twofactortype'=>'off'
            ]);
            return back();
        }
    }

    public function getPhoneVerify(Request $request)
    {
        $request->session()->reflash();
        return view('profile.phoneVerify');
    }

    public function postPhoneVerify(Request $request)
    {
        $request->validate([
            'token'=>'required'
        ]);
        $status=ActiveCode::verifyCode($request->token,$request->user());
        if($status)
        {
           $request->user()->activeCode()->delete();

           $request->user()->update([
               'twofactortype'=>'sms',
               'phone'=>$request->session()->get('phone')
           ]);
           return back();
        }
        else
        {
            toast()->error('کد تایید نادرست است');
            return redirect(route('twofactor'));
        }
       // return $request->token;
    }

    public function upload(Request $request)
    {

        if($request->hasFile('image')){

             $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500']);

            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $originalname = $image->getClientOriginalName();
            $originalname=md5($originalname . microtime()) . substr($originalname, -5, 5);
            $path = $image->move('uploads\user', $originalname);
           //dd($path);


            $userImage=ProfileUser::create([
               'user_id'=>Auth::user()->id,
               'image'=>$path
           ]);


            toast()->success('تصویر با موفقیت آپلود شد');
          /*  $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('uploads\users',$filename);
            Auth()->user()->update(['image'=>$filename]);*/
        }
        return back();
    }

    public function deletepic(ProfileUser $profileUser)
    {
        unlink($profileUser->image);
        $profileUser->delete();
        return back();
    }


    public function karname()
    {
        $natije=Natije::where('user_id',Auth::user()->id)->get();
        $users=User::where('id',Auth::user()->id)->get();
        return view('profile.karname',compact('natije','users'));
    }

}
