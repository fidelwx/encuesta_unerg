<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'ci', 'telephone', 'area_id',
    ];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function area(){
        return $this->belongsTo('App\area');
    }

}
