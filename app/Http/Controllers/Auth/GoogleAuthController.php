<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    use TwoFactorType;
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        /*try
        {
            $googleUser=Socialite::driver('google')->stateless()->user();
            //dd($googleUser);
            $user=User::where('email',$googleUser->email)->first();


            if(!$user)
            {
                $user=User::create([
                    'name'=>$googleUser->name,
                    //'t_tavalod'=>'1363-12-07',
                    //'codemelli'=>'12345678',
                    //'phone'=>'12345678',
                    //'sex'=>'2',
                    //'state_id'=>'17',
                    //'city_id'=>'21',
                    'email'=>$googleUser->email,
                    'username'=>$googleUser->email,
                    'password'=>bcrypt(Str::random(16))
                ]);
            }
            auth()->loginUsingId($user->id);
            return $this->LoggedIn($request,$user)?: redirect(route('login'));

           /* if($user)
            {
                auth()->loginUsingId($user->id);
                //dd($googleUser->email);
            }
            else
            {
                $newUser=User::create([
                    'name'=>$googleUser->name,
                    't_tavalod'=>'1363-12-07',
                    'codemelli'=>'12345678',
                    'phone'=>'12345678',
                    'sex'=>'2',
                    'state_id'=>'1',
                    'city_id'=>'1',
                    'email'=>$googleUser->email,
                    'password'=>bcrypt(Str::random(16))
                ]);
                auth()->loginUsingId($newUser->id);
            }
            return redirect('/');*/
        /*}
        catch (\Exception $e)
        {
            return $e;
            //var_dump(openssl_get_cert_locations());

        }*/
    }
}
