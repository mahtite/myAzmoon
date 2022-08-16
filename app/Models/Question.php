<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'q_name',
        'j1','j2','j3','j4',
        'j_d','zaman'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
