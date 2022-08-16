<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StateCityController;
use App\Models\State;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\Nationalcode;
use App\Rules\Passw;
use App\Rules\Recaptcha;
use App\Rules\Tavalod;

use App\Rules\Uppercase;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Morilog\Jalali\Jalalian;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function showRegistrationForm()
    {
        $states=State::all();
        return view('auth.register',compact('states'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            't_tavalod' =>
                [

                'required', function($attribute, $value, $fail)
                {
                    $dob = Verta::parse($value)->diff(Verta::now())->y;
                    if($dob < 20 || $dob > 40)
                    {
                        return $fail('سن باید بین 20 تا 40 سال باشد');
                    }
                }

            ],
            'sex'=>'required',
            'username'=>['required', 'string',
                //'uppercase'
               // new Uppercase()
                'regex:/^[A-z0-9\-]+$/'
            ],
            'state'=>'required',
            'city'=>'required',
            'codemelli' => ['required', new Nationalcode(),Rule::unique('users','codemelli')],
            'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', \App\Http\Controllers\Auth\Passw::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'g-recaptcha-response'=>['required',new Recaptcha()]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $date = explode("/" , $data['t_tavalod']);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $time = Verta::getGregorian($year,$month,$day);


        return User::create([
            'name' => $data['name'],
            't_tavalod'=> join("-",$time),
            'codemelli' => $data['codemelli'],
            'phone' => $data['phone'],
            'sex' => $data['sex'],
            'username' => $data['username'],
            'state_id' => $data['state'],
            'city_id' => $data['city'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
