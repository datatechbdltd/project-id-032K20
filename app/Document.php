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

    //User
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    //Authorizer
    public function authorizer(){
        return $this->belongsTo(User::class,'authorized_by_id','id');
    }

    //Document type
    public function documentType(){
        return $this->belongsTo(DocumentType::class,'document_type_id','id');
    }
}
