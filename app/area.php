<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    protected $fillable = [
        'name',
    ];

    public function person(){
    	return $this->hasMany('App\person');
    }

    public function answer(){
    	return $this->hasMany('App\answer');
    }
}
