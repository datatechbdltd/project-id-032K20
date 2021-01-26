<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTypesAndUserTypes extends Model
{
    protected $fillable = [
        'document_type_id',
        'user_type_id',
    ];
}
