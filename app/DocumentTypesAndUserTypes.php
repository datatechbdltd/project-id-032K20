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
    public function types(){
        return $this->belongsTo(DocumentType::class,'document_type_id','id');
    }

    //user type
    public function userTypes(){
        return $this->belongsTo(UserType::class,'user_type_id','id');
    }
}
