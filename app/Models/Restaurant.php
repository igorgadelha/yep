<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Restaurant extends Model implements Transformable
{
    use TransformableTrait;

    //
    protected $fillable = [
      'user_id',
      'name',
      'description',
      'phone',
      'address',
      'state',
      'city',
      'zipcode'
    ];

    public function user()
    {
      return $this->hasOne(User::class,'id');
    }

    public function produtcs()
    {
      return $this->hasMany(Product::class,'id');
    }

}
