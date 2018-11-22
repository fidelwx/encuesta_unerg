<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $fillable = [
        'type',
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
