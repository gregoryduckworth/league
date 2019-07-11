<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Greg Duckworth',
                'email' => 'greg.duckworth@bbc.co.uk',
                'password' => '$2y$10$G2GJdNLMBLpj1m5YUL/vKOQqcSMFwxlkHVAMO9zxwCbU/xSIqQJtm',
                'remember_token' => 'exBNpUbTNDPrsHUkoEcY6k1nCvzJ3stcqOe9YvdL06gGXPJqZ0RRVY2RRAJI',
                'created_at' => '2019-07-11 08:49:07',
                'updated_at' => '2019-07-11 08:49:07',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Joe Bradshaw',
                'email' => 'joe.bradshaw@bbc.co.uk',
                'password' => '$2y$10$HdVOIMl7L3yVCs4I3KE6leyeFLGijeDdPWWJSIZi75GzeAC35dlzK',
                'remember_token' => NULL,
                'created_at' => '2019-07-11 09:11:06',
                'updated_at' => '2019-07-11 09:11:06',
            ),
        ));
        
        
    }
}