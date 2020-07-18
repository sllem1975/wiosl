<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    //
    protected $fillable = ['id', 'name'];

    public function matches()
    {
        return $this->hasMany('App\Matches');
    }


}
