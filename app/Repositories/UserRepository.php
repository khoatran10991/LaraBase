<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Abstracts\EloquentRepository;
use App\Repositories\Interfaces\UserInterface;

class UserRepository extends EloquentRepository implements UserInterface
{
   /**
    * @return string
    */
   protected function getModel(): string
   	{
   		return User::class;
   	}
}
