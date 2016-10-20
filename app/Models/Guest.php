<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class, 'participants')->withTimestamps();
    }
}
