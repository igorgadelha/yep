<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Addresses extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
      'street',
      'city',
      'state',
      'note',
      'post_code',
      'country_id',
      'lat',
      'lng',
      'addressable_id',
      'addressable_type',
      'is_primary',
      'is_billing',
      'is_shipping',
    ];


    public function addresses ()
    {
        return $this->belongsTo(\CodeDelivery\Models\User::class);
    }

}
