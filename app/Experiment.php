<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $primaryKey = 'experiment_id';

    protected $fillable = [
        'admin_id', 'subject', 'description',
    ];

    public function form_select()
    {
        return $this->hasOne('App\Form_select');
    }

    public function test_selects()
    {
        return $this->hasMany('App\Test_select');
    }
}
