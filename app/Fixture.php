<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $fillable = [
        'team_1',
        'team_1_score',
        'team_2',
        'team_2_score',
        'date',
    ];

    public function league()
    {
        return $this->hasOne('App\League');
    }

}
