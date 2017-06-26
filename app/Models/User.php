<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Authenticatable implements Transformable {
    use TransformableTrait, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client()
    {
      return $this->hasOne(\CodeDelivery\Models\Client::class);
    }
    public function addresses()
    {
      return $this->hasMany(\CodeDelivery\Models\Addresses::class);
    }

}
