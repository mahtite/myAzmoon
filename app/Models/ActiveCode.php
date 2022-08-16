<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveCode extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'code',
        'expired_at'
    ];

    public $timestamps=false;

    public function scopeGenerateCode($query,$user)
    {
        if($code=$this->getActiveCodeForUser($user))
        {
            $code=$code->code;
        }

        else
        {
            do {
                $code=mt_rand(100000,999999);
            }
            while ($this->checkCodeIsUniq($code, $user));

            $user->activeCode()->create([
                'code'=>$code,
                'expired_at'=>now()->addMinute(10)
            ]);
        }
    }

    private function checkCodeIsUniq($code,$user)
    {
        return !! $user->activeCode()->whereCode($code)->first();
    }

    private function getActiveCodeForUser($user)
    {
        return  $user->activeCode()->where('expired_at','>',now())->first();
    }

    public function scopeVerifyCode($query,$code,$user)
    {
        return !! $user->activeCode()->whereCode($code)->where('expired_at','>',now())->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
