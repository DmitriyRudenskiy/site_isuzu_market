<?php

namespace App\Entities;

use App\Entities\Car\Types;
use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $table = "parts";

    protected $fillable = [
        "visible",
        "priority",
        "amount",
        "price",
        "vendor_code",
        "title",
        "alias",
        "description",
        "image"
    ];

    public function getPath()
    {
        return '/img'
        . DIRECTORY_SEPARATOR
        . 'parts'
        . DIRECTORY_SEPARATOR
        . $this->image;
    }

    public function images()
    {
        return $this->hasMany(PartsImages::class, "part_id", "id");
    }
}

