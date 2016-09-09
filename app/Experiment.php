<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $primaryKey = 'experiment_id';

    protected $fillable = [
        'admin_id', 'subject', 'description',
    ];
}
