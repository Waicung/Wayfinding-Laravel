<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = [];

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class);
    }

    public function origin()
    {
        return $this->belongsTo(Point::class);
    }

    public function destination()
    {
        return $this->belongsTo(Point::class);
    }

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }

    public function instructions()
    {
        return $this->hasManyThrough(Instruction::class, Segment::class);
    }

    public function participant()
    {
        return $this->belongsToMany(Participant::class, 'assignments')
                    ->withPivot('id','next_id')
                    ->withTimestamps();
    }

    public static function newRoute(Point $origin, Point $destination)
    {
        return Route::create([
            'origin_id' => $origin->id,
            'destination_id' => $destination->id,
        ]);
    }

}
