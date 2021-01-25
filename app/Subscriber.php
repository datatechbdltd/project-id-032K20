<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'device',
        'ip_address',
        'addresss',
        'time_zone',
    ];
}
