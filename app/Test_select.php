<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_select extends Model
{
    //
    public function experiment()
    {
        return $this->belongsTo('App\Experiment');
    }
}
