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
            ->withPivot('points', 'won', 'drawn', 'lost', 'goalsFor', 'goalsAgainst')
            ->withTimestamps();
    }

    public function fixtures()
    {
        return $this->hasMany('App\Fixture');
    }

}
