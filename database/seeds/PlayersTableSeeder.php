<?php

use App\Player;
use App\Team;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Player::create([
                'name' => $faker->name,
                'team_id' => rand(1, count(Team::all())),
            ]);
        }

    }

}
