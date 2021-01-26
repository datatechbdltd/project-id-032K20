<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id',
        'doocument',
        'document_type_id',
        'extention',
        'authorized_by_id',
        'authorization_note',
        'is_approved',
    ];
}
