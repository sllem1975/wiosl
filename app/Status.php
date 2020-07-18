<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    protected $fillable = ['id',
        'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function matches()
    {
        return $this->hasMany('App\Matches');
    }
}
