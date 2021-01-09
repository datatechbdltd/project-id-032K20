<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticOption extends Model
{
    protected $table = 'static_options';
    protected $fillable = ['option_name','option_value'];

    /**
     * activity log
     */
    //Log name
    protected static $logName = 'Static option';
    //All of fillable store in log
    public static $logFillable = true;
    //Ignorable log
    protected static $ignoreChangedAttributes = ['created_at', 'updated_at'];
    //Log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return  auth()->user()->name." has been {$eventName} static option";
    }
}
