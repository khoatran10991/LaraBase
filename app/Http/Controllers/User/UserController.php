<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $userRepo;

    /**
     * UserController constructor.
     * @param  UserInterface  $userRepo
     */
    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
}
