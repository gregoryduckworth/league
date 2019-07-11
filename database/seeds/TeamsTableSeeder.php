<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '5 Live',
                'contact' => 'David Batchelor',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:49:51',
                'updated_at' => '2019-07-11 08:49:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bitesize/Learning',
                'contact' => 'Laurence Alexander',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:00',
                'updated_at' => '2019-07-11 08:50:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'BBC Breakfast',
                'contact' => 'Edward Curwen',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:10',
                'updated_at' => '2019-07-11 08:50:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Central Editorial',
                'contact' => 'Joe Bradshaw',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:18',
                'updated_at' => '2019-07-11 08:50:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Children\'s',
                'contact' => 'Dave Coulson',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:26',
                'updated_at' => '2019-07-11 08:50:26',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Content Discovery',
                'contact' => 'Greg Duckworth',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:32',
                'updated_at' => '2019-07-11 08:50:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'M&A',
                'contact' => 'David Wheadon',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:40',
                'updated_at' => '2019-07-11 08:50:40',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Newsround',
                'contact' => 'Verity Stockdale',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:47',
                'updated_at' => '2019-07-11 08:50:47',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Short Form',
                'contact' => 'Phil Wright-Lewis/Rhodri Hywel',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:50:54',
                'updated_at' => '2019-07-11 08:50:54',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Sport Online',
                'contact' => 'Alex Bysouth',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:51:00',
                'updated_at' => '2019-07-11 08:51:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'World Service/Sports News Radio',
                'contact' => 'Sam Sheringham',
                'deleted_at' => NULL,
                'created_at' => '2019-07-11 08:51:07',
                'updated_at' => '2019-07-11 08:51:07',
            ),
        ));
        
        
    }
}