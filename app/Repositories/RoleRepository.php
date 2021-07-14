<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Abstracts\EloquentRepository;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository extends EloquentRepository implements RoleInterface
{
   /**
    * @return string
    */
   protected function getModel(): string
   	{
   		return Role::class;
   	}
}
