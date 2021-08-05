<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Facade\Ignition\Support\FakeComposer;
use Faker\Factory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request)
    {
        $user = [];

        $faker = Factory::create();
        $count = $faker->numberBetween(3, 15);

        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                'id' => $faker->numberBetween(1, 1000),
                'name' => $faker->firstName
            ];
        }



        //Zadanie
        $succesOrFail = $faker->numberBetween(0, 1);
        $request->session()->flash('succesOrFail', $succesOrFail);

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function Show(Request $request, int $id)
    {



        $faker = Factory::create();
        $user = [
            'id' => $id,
            'name' => $faker->name,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(10, 40),
            'html' => '<b>Bold HTML</b>'
        ];

        return view('user.show', [
            'user' => $user

        ]);
    }
}
