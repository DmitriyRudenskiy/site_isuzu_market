<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = "banks";

    protected $fillable = [
        "visible",
        "position",
        "precent",
        "title",
        "image"
    ];
}