<?php

namespace App\Services;

use App\Repositories\Interfaces\UserInterface;
use App\Services\Abstracts\BaseService;
use App\Services\Interfaces\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    /**
    * @param  UserInterface  $userRepository
    */
    public function __construct(UserInterface $userRepository)
    {
        parent::__construct($userRepository);
    }
}