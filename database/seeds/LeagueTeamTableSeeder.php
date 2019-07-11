<?php

use Illuminate\Database\Seeder;

class LeagueTeamTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('league_team')->delete();
        
        \DB::table('league_team')->insert(array (
            0 => 
            array (
                'league_id' => 1,
                'team_id' => 1,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:17',
                'updated_at' => '2019-07-11 08:51:17',
            ),
            1 => 
            array (
                'league_id' => 1,
                'team_id' => 2,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:17',
                'updated_at' => '2019-07-11 08:51:17',
            ),
            2 => 
            array (
                'league_id' => 1,
                'team_id' => 3,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:17',
                'updated_at' => '2019-07-11 08:51:17',
            ),
            3 => 
            array (
                'league_id' => 1,
                'team_id' => 4,
                'points' => 3,
                'won' => 1,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 10,
                'goalsAgainst' => 8,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:52:22',
            ),
            4 => 
            array (
                'league_id' => 1,
                'team_id' => 5,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:51:18',
            ),
            5 => 
            array (
                'league_id' => 1,
                'team_id' => 6,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:51:18',
            ),
            6 => 
            array (
                'league_id' => 1,
                'team_id' => 7,
                'points' => 3,
                'won' => 1,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 15,
                'goalsAgainst' => 7,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:53:45',
            ),
            7 => 
            array (
                'league_id' => 1,
                'team_id' => 8,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 1,
                'goalsFor' => 8,
                'goalsAgainst' => 10,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:52:22',
            ),
            8 => 
            array (
                'league_id' => 1,
                'team_id' => 9,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 1,
                'goalsFor' => 7,
                'goalsAgainst' => 15,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:53:45',
            ),
            9 => 
            array (
                'league_id' => 1,
                'team_id' => 10,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:51:18',
            ),
            10 => 
            array (
                'league_id' => 1,
                'team_id' => 11,
                'points' => 0,
                'won' => 0,
                'drawn' => 0,
                'lost' => 0,
                'goalsFor' => 0,
                'goalsAgainst' => 0,
                'created_at' => '2019-07-11 08:51:18',
                'updated_at' => '2019-07-11 08:51:18',
            ),
        ));
        
        
    }
}