<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['id',
        'name', 'address', 'stadium_id', 'user_id', 'status_id'
    ];

    public function team(){
        return $this->hasMany('App\User');
    }

    public function playermatches(){
        return $this->hasMany('App\Team');
    }

    public function home_team(){
        return $this->hasMany('Match', 'home_id');
    }

    public function away_team(){
        return $this->hasMany('Match', 'away_id');
    }


}
