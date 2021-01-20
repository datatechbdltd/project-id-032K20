<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermsAndCondition extends Model
{
    protected $fillable = [
        'status',
        'serial',
        'title',
        'description',
    ];
}
