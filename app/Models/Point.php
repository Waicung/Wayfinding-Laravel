<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

    protected $guarded = [];

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

    public static function newPoint ($attributes)
    {
        $title = isset($attributes['title'])? $attributes['title']: $attributes['latitude']. ','. $attributes['longitude'];
        try {
            return Point::create([
                'latitude' => $attributes['latitude'],
                'longitude' => $attributes['longitude'],
                'title' => $title
            ]);
        } catch (\Exception $e) {
            return Point::where('latitude', $attributes['latitude'])->where('longitude', $attributes['longitude'])->first();
        }
    }

}
