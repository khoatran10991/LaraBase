<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Abstracts\EloquentRepository;
use App\Repositories\Interfaces\PermissionInterface;

class PermissionRepository extends EloquentRepository implements PermissionInterface
{
   /**
    * @return string
    */
   protected function getModel(): string
   	{
   		return Permission::class;
   	}
}
