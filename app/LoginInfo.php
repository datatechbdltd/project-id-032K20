<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginInfo extends Model
{
    protected $fillable = [
        'user_id',
        'location',
        'geolocation',
        'device',
        'ip_address',
        'browser',
    ];
}
