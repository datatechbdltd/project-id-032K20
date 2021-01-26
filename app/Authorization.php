<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
        'user_id',
        'authorized_by_id',
        'authorization_note',
        'is_approved',
    ];
}
