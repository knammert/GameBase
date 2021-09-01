<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Facade\Ignition\Support\FakeComposer;
use Faker\Factory;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        Gate::authorize('admin-level');

        $users = $this->userRepository->all();

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function Show(int $id)
    {
        Gate::authorize('admin-level');

        $userModel = $this->userRepository->get($id);

        Gate::authorize('view', $userModel);



        return view('user.show', [
            'user' => $this->userRepository->get($id)
        ]);
    }
}
