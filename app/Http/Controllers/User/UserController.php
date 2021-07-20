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

    /**
     * Display list user
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = $this->userRepo->paginate();
        return view('user.index',['users' => $users]);
    }


    /**
     * @return Application|Factory|View
     */
    public function addView()
    {
        $scopes = config('constants.user.scope');
        $scopes = array_map(function ($item){
            return Str::ucfirst($item);
        }, $scopes);
        return view('user.add',[
            'scopes' => $scopes
        ]);
    }

    /**
     * @param  UserRequest  $request
     * @return RedirectResponse
     */
    public function add(UserRequest $request): RedirectResponse
    {
        if($this->userRepo->create($request->all())){
            $request->session()->flash('message-success', __('message.create_success',['name' => __('message.attributes.user')]));
            return Redirect::intended(route('user.index'));
        }
        $request->session()->flash('message-error', __('message.create_fail',['name' => __('message.attributes.user')]));
        return Redirect::intended(route('user.index'));
    }

    public function editView(Request $request, int $id)
    {
        $user = $this->userRepo->find($id);

        $scopes = config('constants.user.scope');
        $scopes = array_map(function ($item){
            return Str::ucfirst($item);
        }, $scopes);

        return view('user.edit',[
            'scopes' => $scopes,
            'user' => $user
        ]);
    }
}
