<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = ['id',
        'name', 'address', 'type'
    ];

    public function matches2()
    {
        return $this->hasMany('App\Match');
    }
}
