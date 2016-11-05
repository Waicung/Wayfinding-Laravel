<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    public function assignment()
    {
        return $this->belongsTo(Assignment::Class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::Class);
    }
}
