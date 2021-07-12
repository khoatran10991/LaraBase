<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DateTime;
use Illuminate\Support\Facades\Hash;

/**
 * @property int      $UserId
 * @property int      $IsActive
 * @property string   $UserName
 * @property string   $Password
 * @property string   $Email
 * @property string   $Scope
 * @property string   $CreatedBy
 * @property string   $RememberToken
 * @property string   $ReferralCode
 * @property DateTime $CreatedDate
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'User';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'UserId';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserId', 'UserName', 'Password', 'Email', 'Scope', 'IsActive', 'CreatedDate', 'CreatedBy', 'RememberToken', 'ReferralCode'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'RememberToken',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'UserId' => 'int', 'UserName' => 'string', 'Password' => 'string', 'Email' => 'string', 'Scope' => 'string', 'IsActive' => 'int', 'CreatedDate' => 'datetime', 'CreatedBy' => 'string', 'RememberToken' => 'string', 'ReferralCode' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'CreatedDate'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Set Attribute
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value);
    }

    public function setScopeAttribute($value)
    {
        $this->attributes['Scope'] = $value ?? config('constants.user.scope.user','user');
    }

    public function setRememberToken($token)
    {
        $this->RememberToken = $token;
    }
    
    /**
     * Authentication with Password
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->Password;
    }

    /**
     * Get RememberToken Attribute
     * @return string
     */
    public function getRememberTokenName(): ?string
    {
        return 'RememberToken';
    }


    // Scopes...

    // Functions ...

    // Relations ...
}
