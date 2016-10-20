<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Traits\Userable;

class Admin extends Model
{

    // use Userable;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function experiments()
    {
        return $this->hasMany(Experiment::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }



}
