<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function privious()
    {
        return $this->hasOne(Assignment::Class, 'next_id');
    }

    public function next()
    {
        return $this->belongsTo(Assignment::Class, 'next_id');
    }

    public function modifications()
    {
        return $this->hasMany(Modification::Class);
    }
}
