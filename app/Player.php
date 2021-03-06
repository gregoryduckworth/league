<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function stats()
    {
        return $this->hasMany('App\PlayerStat');
    }

    public function goals($league_id, $team_id)
    {
        return $this->stats->where('league_id', $league_id)->where('team_id', $team_id)->sum('goals');
    }

    public function allGoals()
    {
        return $this->stats->sum('goals');
    }

    public function leagueGoals($league_id)
    {
        return $this->stats->where('league_id', $league_id)->sum('goals');
    }
}
