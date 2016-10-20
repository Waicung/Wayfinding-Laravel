<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    public function segments()
    {
        return $this->belongsTo(Route::class);
    }
}
