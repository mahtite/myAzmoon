<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements mustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'twofactortype',
        't_tavalod',
        'state_id',
        'city_id',
        'sex',
        'codemelli',
        'password',
        'image','username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getTtavalodAttribute($t_tavalod)
    {
        $v=new Verta($t_tavalod);
        $v=$v->format('Y/n/j');
        return $v;
    }

    public function getUpdateAtAttribute($update_at)
    {
        $v=new Verta($update_at);
        $v=$v->format('Y/n/j');
        return $v;
    }

    public function getUsernameAttribute($username)
    {
        //return strtolower($username);
        return strtoupper($username);
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function hasTwoFactorAuthenticatedEnable()
    {
        return $this->twofactortype !== 'off';
    }


   public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyEmail());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    public function hasPermission($permission)
    {
        return $this->permissions->contains('name',$permission->name)|| $this->hasRole($permission->roles);
    }

    public function hasRole($roles)
    {
        return $roles->intersect($this->roles)->all();
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function profiles()
    {
        return $this->hasMany(ProfileUser::class);
    }

}
