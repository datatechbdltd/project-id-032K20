<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
        'status',
        'code',
        'name',
        'sign',
    ];
}
