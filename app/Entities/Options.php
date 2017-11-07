<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $table = 'options';

    protected $fillable = [
        "type_id",
        "title",
        "price"
    ];
}

