<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'generatedFixtures',
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Team')
            ->withPivot('points', 'won', 'drawn', 'lost')
            ->withTimestamps();
    }

    public function teamStandings()
    {
        $team_1 = \DB::table('fixtures as f1')
            ->select('team_1', \DB::raw('SUM(`team_1_score`) AS `team_1_for`'), \DB::raw('SUM(`team_2_score`) AS `team_2_against`'), \DB::raw('SUM(CASE WHEN `team_1_score` > `team_2_score` THEN \'3\' WHEN `team_1_score` = `team_2_score` AND `pointsAdded` IS NOT NULL THEN \'1\' ELSE \'0\' END) AS `team_1_points`'))
            ->where('league_id', '=', $this->id)
            ->groupBy('team_1');

        $team_2 = \DB::table('fixtures as f2')
            ->select('team_2', \DB::raw('SUM(`team_1_score`) AS `team_1_against`'), \DB::raw('SUM(`team_2_score`) AS `team_2_for`'), \DB::raw('SUM(CASE WHEN `team_2_score` > `team_1_score` THEN \'3\' WHEN `team_1_score` = `team_2_score` AND `pointsAdded` IS NOT NULL THEN \'1\' ELSE \'0\' END) AS `team_2_points`'))
            ->where('league_id', '=', $this->id)
            ->groupBy('team_2');

        return $this->belongsToMany('App\Team')
            ->joinSub($team_1, 'f1', function ($join) {
                $join->on('f1.team_1', '=', 'teams.id');
            })
            ->joinSub($team_2, 'f2', function ($join) {
                $join->on('f2.team_2', '=', 'teams.id');
            })
            ->select('*');
    }

    public function fixtures()
    {
        return $this->hasMany('App\Fixture');
    }

    public function stats()
    {
        return $this->hasMany('App\PlayerStat');
    }

}
