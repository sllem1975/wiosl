<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $dates = ['date']; 
    protected $fillable = [
        'season_id', 'game_week', 'phase_id', 'home_id',
        'home_score', 'away_id', 'away_score', 'stadium_id', 'date',
        'user_id', 'status_id', 'observation', 
    ];

    public function getDateAttribute($value)
{
    return Carbon::parse($value)->format('Y-m-d\TH:i');
}

    public function season(){
        return $this->belongsTo('App\Season');
    }

    public function phase(){
        return $this->belongsTo('App\Phase');
    }

    public function team_home(){
        return $this->belongsTo('App\Team', 'home_id', 'id');
    }

    public function team_away(){
        return $this->belongsTo('App\Team', 'away_id', 'id');
    }

    // public function stadium(){
    //     return $this->belongsTo('App\Address', 'stadium_id', 'id');
    // }

    public function address(){
        return $this->belongsTo('App\Address', 'stadium_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }


}
