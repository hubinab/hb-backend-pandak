<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panda extends Model
{
    protected $fillable = [
        "name",
        "sex",
        "birth"
    ];
}
