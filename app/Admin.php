<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $primaryKey = 'admin_id';

    protected $fillable = ['admin_id'];
}
