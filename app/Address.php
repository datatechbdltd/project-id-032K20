<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'primary_address',
        'secondary_address',
        'user_id',
        'state',
        'city',
        'zip',
        'country_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
