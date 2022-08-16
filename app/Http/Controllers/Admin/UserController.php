<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\ProfileUser;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use App\Rules\Nationalcode;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function __construct()
    {
       // $this->middleware(['auth','can:users,user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return  view('admin.users.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states =State::all();
        return  view('admin.users.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([

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
                'regex:/^[A-z0-9\-]+$/'
            ],
            'state'=>'required',
            'city'=>'required',
            'codemelli' => ['required', new Nationalcode(),Rule::unique('users','codemelli')],
            'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
        ]);


        $date = explode("/" , $data['t_tavalod']);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $time = Verta::getGregorian($year,$month,$day);


        User::create([
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
        toast()->success('کاربر جدید ایجاد شد');

        $users=User::all();
        return view('admin.users.all',compact('users'));

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
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user->id)],
            'codemelli' => ['required', new Nationalcode(),Rule::unique('users')->ignore($user->id)],
            'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
            'password' => 'nullable',
        ]);
        if($request['password']){
            $request->validate([
                'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
                ],
            ]);
        }

        $request['password']=Hash::make($request['password']);
        $user->update($request->all());
        toast()->success('ویرایش با موفقیت انجام شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //$profile=ProfileUser::where('user_id',$user->id)->first();
        //unlink($profile->image);

        $user->delete();
        toast()->success('حذف انجام شد');
        return back();
    }

    public function showUser(Request $request)
    {
        $users = User::all();
        if($request->keyword != ''){
            $users = User::where('codemelli','LIKE','%'.$request->keyword.'%')->get();
      }
        return response()->json([
            'users' => $users
        ]);
    }

    public function multiDelete(Request $request)
    {
        User::whereIn('id', $request->get('selected'))->delete();

        return response("موارد انتخاب شده با موفقیت حذف گردید", 200);
    }

    public function addRole(User $user)
    {
        $roles=Role::all();
        $permissions=Permission::all();
        return view('admin.users.roles',compact('roles','user','permissions'));
    }

    public function updateRole(User $user,Request $request)
    {
        $user->roles()->sync($request->roles);
        $user->permissions()->sync($request->permissions);
        return back();
    }

}
