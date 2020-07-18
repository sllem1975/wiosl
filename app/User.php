<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'phone', 'email', 'password', 'role_id', 'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // for create relationship with role
     public function role(){
        return $this->belongsTo('App\Role');
    }

    // for create relationship with status
    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function getUrlAttribute()
    {
        return route("users.show", $this->id);
    }

    // convert to html form
    //   public function setTitleAttribute($value)
    //   {
    //       $this->attributes['title']= $value;
    //       $this->attributes['slug'] = str_slug($value);
    //   }

    
}
