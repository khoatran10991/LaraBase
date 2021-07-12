<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
/**
 * @property string   $RoleId
 * @property string   $RoleName
 * @property boolean  $IsActive
 * @property DateTime $CreatedDate
 * @property DateTime $UpdatedDate
 * @property int      $CreatedBy
 * @property int      $UpdatedBy
 */
class Role extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Role';

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
        'RoleId', 'RoleName', 'Priority', 'IsActive', 'CreatedDate', 'CreatedBy', 'UpdatedDate', 'UpdatedBy'
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
        'RoleId' => 'string', 'RoleName' => 'string', 'IsActive' => 'boolean', 'CreatedDate' => 'datetime', 'CreatedBy' => 'int', 'UpdatedDate' => 'datetime', 'UpdatedBy' => 'int'
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
