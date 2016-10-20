<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function origin()
    {
        return $this->hasMany(Route::class, 'origin_id');
    }

    public function destination()
    {
        return $this->hasMany(Route::class, 'destination_id');
    }

    public function start()
    {
        return $this->hasMany(Segment::class, 'start_id');
    }

    public function end()
    {
        return $this->hasMany(Segment::class, 'end_id');
    }

}
