<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route_select extends Model
{
    //
    public function experiment()
    {
        return $this->belongsTo('App\Experiment');
    }
}
