<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Greg Duckworth',
            'email' => 'greg.duckworth@bbc.co.uk',
            'password' => bcrypt('password'),
        ]);
    }
}
