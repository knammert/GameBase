<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Factory;
use Faker\Factory as FakerFactory;

class ShowAddress extends Controller
{
    public function __invoke(int $id)
    {
        $faker = FakerFactory::create();

        $address = [
            'postalCode' => $faker->postcode,
            'street' => $faker->streetName,
            'houseNumber' => $faker->numberBetween(1, 100),
            'flatNumber' => $faker->numberBetween(1, 100)
        ];



        return view('user.address', [
            'address' => $address
        ]);
    }
}
