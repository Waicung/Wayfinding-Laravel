<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{

    protected $fillable = [
        'subject', 'description',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Guest::class, 'participants')->withTimestamps();
    }





}
