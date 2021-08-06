<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        DB::table('games')->truncate();

        // for ($i = 0; $i < 1000; $i++) {
        //     DB::table('games')->insert([
        //         'title' => $faker->words($faker->numberBetween(1, 4), true),
        //         'description' => $faker->sentence,
        //         'publisher' => $faker->randomElement(['Atari', 'EA', 'Blizzard', 'Ubisoft']),
        //         'genere_id' => $faker->numberBetween(1, 5),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
        $games = [];

        for ($i = 0; $i < 1000; $i++) {
            $games[] = [
                'title' => $faker->words($faker->numberBetween(1, 4), true),
                'description' => $faker->sentence,
                'publisher' => $faker->randomElement(['Atari', 'EA', 'Blizzard', 'Ubisoft']),
                'genere_id' => $faker->numberBetween(1, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('games')->insert($games);
    }
}
