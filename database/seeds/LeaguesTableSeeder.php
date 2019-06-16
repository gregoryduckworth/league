<?php

use App\League;
use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        League::create([
            'name' => 'Inter Dept Footie 18/19',
        ]);
    }
}
