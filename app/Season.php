<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['id',
    'season_name', 'date_start', 'date_end', 'status_id', 'league_id' 
    ];

    public function matches(){
        return $this->hasMany('app\matches');
    }

    public function playermatches(){
        return $this->hasMany('app\matches');
    }
}
