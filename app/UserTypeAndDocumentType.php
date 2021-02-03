<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypeAndDocumentType extends Model
{
    protected $fillable = [
        'user_type_id',
        'document_type_id',
        'is_active',
    ];

    public function userType(){
        return $this->belongsTo(UserType::class,'user_type_id','id');
    }

    public function documentType(){
        return $this->belongsTo(DocumentType::class,'user_type_id','id')->where('is_active', true);
    }
}
