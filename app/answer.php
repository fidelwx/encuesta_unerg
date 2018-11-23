<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = [
        'answer', 'user_id', 'poll_id', 'radios', 'poll_id', 'area_id',
    ];

    public function user(){
    	return $this->belognsTo('App\User');
    }

    public function poll(){
    	return $this->belognsTo('App\poll');
    }

    public function area(){
    	return $this->belognsTo('App\area');
    }
}
