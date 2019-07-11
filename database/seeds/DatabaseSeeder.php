<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(LeaguesTableSeeder::class);
        $this->call(LeagueTeamTableSeeder::class);
        $this->call(FixturesTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
    }
}
