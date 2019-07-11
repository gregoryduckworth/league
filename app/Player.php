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
        'goals',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
