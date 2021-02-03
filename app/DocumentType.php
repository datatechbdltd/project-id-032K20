<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = [
        'name',
        'status',
        'correct_example',
        'false_example',
    ];

    //document type
    public function documentTypesAndUserTypes(){
        return $this->hasMany(DocumentTypesAndUserTypes::class,'document_type_id','id');
    }
}
