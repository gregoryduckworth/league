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
        'goals',
    ];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
