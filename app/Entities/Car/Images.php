<?php

namespace App\Entities\Car;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "car_images";

    protected $fillable = [
        "type_id",
        "base_id",
        "price",
        "image"
    ];

    public $timestamps = false;
}