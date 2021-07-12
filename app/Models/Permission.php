<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * @property int      $PermissionId
 * @property int      $CreatedBy
 * @property int      $UpdatedBy
 * @property string   $PermissionCode
 * @property string   $ParentPermissionCode
 * @property string   $Title
 * @property string   $TitleVi
 * @property string   $Site
 * @property string   $Type
 * @property string   $Mode
 * @property boolean  $IsActive
 * @property DateTime $CreatedDate
 * @property DateTime $UpdatedDate
 */
class Permission extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Permission';

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
        'PermissionId', 'PermissionCode', 'ParentPermissionCode', 'Title', 'TitleVi', 'Site', 'Type', 'Priority', 'IsActive', 'CreatedDate', 'CreatedBy', 'UpdatedDate', 'UpdatedBy', 'Mode'
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
        'PermissionId' => 'int', 'PermissionCode' => 'string', 'ParentPermissionCode' => 'string', 'Title' => 'string', 'TitleVi' => 'string', 'Site' => 'string', 'Type' => 'string', 'IsActive' => 'boolean', 'CreatedDate' => 'datetime', 'CreatedBy' => 'int', 'UpdatedDate' => 'datetime', 'UpdatedBy' => 'int', 'Mode' => 'string'
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
