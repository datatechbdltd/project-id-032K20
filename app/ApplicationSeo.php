<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationSeo extends Model
{
    protected $fillable = [
        'language_code',
        'author',
        'description',
        'keyword',
    ];
}
