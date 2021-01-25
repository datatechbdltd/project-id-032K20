<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'primary_address',
        'secondary_address',
        'state',
        'city',
        'zip',
        'country_id',
    ];

    /*//User
    public function user(){
        return $this->hasOne(User::class);
    }*/
}
