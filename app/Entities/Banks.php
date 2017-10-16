<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = 'banks';

    protected $fillable = [
        "title",
        "image",
        "precent",
        "show"
    ];
}

