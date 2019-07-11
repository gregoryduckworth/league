<?php

use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('leagues')->delete();
        
        \DB::table('leagues')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Inter Dept Footie 19/20',
                'generatedFixtures' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:49:23',
                'updated_at' => '2019-07-11 08:51:27',
            ),
        ));
        
        
    }
}