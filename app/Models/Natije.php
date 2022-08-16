<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natije extends Model
{
    use HasFactory;
    protected $fillable=['user_id','tedad_kol','tedad_d','nomre'];
}
