<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypeAndDocumentType extends Model
{
    protected $fillable = [
        'user_type_id',
        'document_type_id',
    ];
}
