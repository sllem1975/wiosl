<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['id', 
    'league_name', 'division', 'user_id']; 

    public function matches() {
        return $this->hasMany('App\Matches');
    }

    public function playermatches() {
        return $this->hasMany('App\PlayerMatch');
    }

}
