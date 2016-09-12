<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    //
    protected $primaryKey = 'point_id';

    public function experiment()
    {
        return $this->belongsTo('App\Experiment');
    }

    public function route()
    {
        return $this->belongsTo('App\Route');
    }

    public function segment()
    {
        return $this->belongsTo('App\Segment');
    }


}
