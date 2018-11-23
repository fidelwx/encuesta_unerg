<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poll extends Model
{
    protected $fillable = [
        'question', 'text',
    ];

    public function answers(){
    	return $this->hasMany('App\answer');
    }
}
