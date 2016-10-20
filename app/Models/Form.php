<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $fillable = [
        'title'
    ];

    public function experiments()
    {
        return $this->belongsToMany(Experiment::class);
    }

}
