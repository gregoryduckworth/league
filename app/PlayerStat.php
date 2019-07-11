<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerStat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'player_id',
        'league_id',
        'team_id',
        'goals',
    ];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function league()
    {
        return $this->belongsTo('App\League');
    }

    public function goals($league_id, $team_id)
    {
        return $this->where('league_id', $league_id)->where('team_id', $team_id)->get('goals');
    }
}
