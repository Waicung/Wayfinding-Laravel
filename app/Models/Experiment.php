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

    public function addForm(Form $form)
    {
        return $this->forms()->attach($form);
    }

    public function addTest(Test $test)
    {
        return $this->tests()->attach($test);
    }

    public function addTests($tests)
    {
        foreach ($tests as $test) {
            if ($test instanceOf Test) {
                $this->addTest($test);
            }
        }
    }

    public function addRoute(Route $route)
    {
        return $this->routes()->attach($route);
    }

    public function addRoutes($routes)
    {
        foreach ($routes as $route) {
            if ($route instanceOf Route) {
                $this->addRoute($route);
            }
        }
    }






}
