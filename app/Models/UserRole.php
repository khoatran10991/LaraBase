<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int      $UserId
 * @property int      $CreatedBy
 * @property int      $UpdatedBy
 * @property string   $RoleId
 * @property DateTime $CreatedDate
 * @property DateTime $UpdatedDate
 */
class UserRole extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UserRole';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserId', 'RoleId', 'CreatedDate', 'CreatedBy', 'UpdatedDate', 'UpdatedBy'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'UserId' => 'int', 'RoleId' => 'string', 'CreatedDate' => 'datetime', 'CreatedBy' => 'int', 'UpdatedDate' => 'datetime', 'UpdatedBy' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'CreatedDate', 'UpdatedDate'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
