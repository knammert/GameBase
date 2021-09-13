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

    public function Show(Request $request, int $id)
    {
       $this->authorize('admin-level');
        // $user = $request->user();
        // if ($user->cannot('admin-level')) {
        //     abort(403);
        // }

        // // Gate::authorize('admin-level');

        // $userModel = $this->userRepository->get($id);

        // if ($user->cannot('view', $userModel)) {
        //     abort(403);
        // }

        // Gate::authorize('view', $userModel);



        return view('user.show', [
            'user' => $this->userRepository->get($id)
        ]);
    }
}
