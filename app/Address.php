<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['id',
        'name', 'address', 'type','status_id',
    ];

    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
