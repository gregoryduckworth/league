<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact',
    ];

    public function leagues()
    {
        return $this->belongsToMany('App\League')
            ->withTimestamps();
    }

    public function inLeague($league_id)
    {
        if ($this->leagues()->where('league_id', '=', $league_id)->first()) {
            return true;
        }
        return false;
    }

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
