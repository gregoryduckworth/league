<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('players')->delete();
        
        \DB::table('players')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Nigel Perfect',
                'team_id' => 4,
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 09:17:04',
                'updated_at' => '2019-07-11 09:34:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Greg Duckworth',
                'team_id' => 6,
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 10:06:41',
                'updated_at' => '2019-07-11 10:06:41',
            ),
        ));
        
        
    }
}