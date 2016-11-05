<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function instruction()
    {
        return $this->hasOne(Instruction::class);
    }

    public function start()
    {
        return $this->hasOne(Point::class);
    }

    public function end()
    {
        return $this->hasOne(Point::class);
    }

    public function modification()
    {
        return $this->hasMany(Modification::Class);
    }

}
