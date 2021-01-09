<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Language extends Model
{
    use LogsActivity;

    protected $fillable =[
        'status',
        'name',
        'code',
        'flag',
        'alignment',
    ];

    /**
     * activity log
     */
    //Log name
    protected static $logName = 'Language';
    //All of fillable store in log
    public static $logFillable = true;
    //Ignorable log
    protected static $ignoreChangedAttributes = ['created_at', 'updated_at'];
    //Log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return auth()->user()->name." has been {$eventName} language";
    }

    /**
     * Relation
     */
    //Accounts
    public function application_seo(){
        return $this->hasOne(ApplicationSeo::class,'language_code','code');
    }
}
