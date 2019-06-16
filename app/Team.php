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

    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
