<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    /** @var array */
    protected $fillable = [
        'name',
        'description'
    ];
}
