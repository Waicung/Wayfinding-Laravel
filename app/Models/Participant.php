<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    public function routes()
    {
        return $this->belongsToMany(Route::Class, 'assignments')
            ->withPivot('id','next_id')
            ->withTimestamps();
    }
}
