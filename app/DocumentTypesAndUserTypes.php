<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTypesAndUserTypes extends Model
{
    protected $fillable = [
        'document_type_id',
        'user_type_id',
    ];

    //document type
    public function documentType(){
        return $this->belongsTo(DocumentType::class,'document_type_id','id');
    }

    //user type
    public function userType(){
        return $this->belongsTo(UserType::class,'user_type_id','id');
    }
}
