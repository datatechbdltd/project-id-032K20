<?php

namespace App;

use App\Http\Controllers\Administrative\DocumentTypeController;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = [
        'name',
    ];

    //User
    public function user(){
        return $this->hasOne(User::class,'type_id','id');
    }

    //DocumentTypesAndUserTypes
    public function documentTypesAndUserTypes(){
        return $this->hasMany(DocumentTypesAndUserTypes::class,'user_type_id','id')->where('is_active', true);
    }
}
