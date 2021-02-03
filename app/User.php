<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, LogsActivity, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'user_type_id',
        'name',
        'username',
        'phone',
        'email',
        'language',
        'time_zone',
        'password',
        'api_token',
        'avatar',
        'status',
        'phone_verified_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * activity log
     */
    //Log name
    protected static $logName = 'user';
    //All of fillable store in log
    public static $logFillable = true;
    //Ignorable log
    protected static $ignoreChangedAttributes = ['created_at', 'updated_at'];
    //Log description
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has been {$eventName} user";
    }

    //Provider
    public function provider(){
        return $this->hasOne(Provider::class,'provider_user_id','code');
    }

    //flight for provider
    public function flights(){
        return $this->hasMany(Flight::class,'provider_id','id');
    }
    // address
    public function address(){
        return $this->hasOne(Address::class, 'user_id','id');
    }


    /*//Address
  public function address(){
      return $this->belongsTo(Address::class);
  }*/

    //User Type
    public function userType(){
        return $this->belongsTo(UserType::class,'type_id','id');
    }

    //Documents
    public function documents(){
        return $this->hasMany(Document::class,'user_id','id');
    }

    //authorized document | this document authorized by me
    public function authorizedDocuments(){
        return $this->hasMany(Document::class,'authorized_by_id','id');
    }


}
