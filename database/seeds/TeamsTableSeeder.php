<?php

use App\League;
use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $league = League::find(1);

        $teams = [
            Team::create([
                'name' => 'Content Discovery',
                'contact' => 'Greg Duckworth',
            ]),
            Team::create([
                'name' => 'Central Editorial',
                'contact' => 'Joe Bradshaw',
            ]),
        ];

        $league->teams()->saveMany($teams);

    }

}
