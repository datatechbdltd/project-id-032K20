<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'approved_by_id',
        'provider_id',
        'from',
        'to',
        'price',
        'departing',
        'returning',
        'status',
    ];

    //Provider
    public function provider(){
        return $this->belongsTo(User::class,'provider_id','id');
    }

    //Administrative
    public function administrative(){
        return $this->belongsTo(User::class,'approved_by_id','id');
    }
}
