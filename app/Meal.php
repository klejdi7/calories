<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = "meals";
    public $timestamps = false;

    protected $fillable = ['user_id','meal','calories','date','time'];
    
}
