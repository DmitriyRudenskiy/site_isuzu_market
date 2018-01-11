<?php

namespace App\Entities\Car;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = "car_types";

    protected $fillable = [
        "visible",
        "position",
        "title",
        "image"
    ];

    public $timestamps = false;

    public function __toString()
    {
        return str_replace('<br>', ' ', $this->title);
    }
}