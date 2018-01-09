<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = [
        "title",
        "price",
        "size_small",
        "size_big",
        "type_id",
        "category_id",
        "ton",
        "in_stock",
        "description",
        "config_url"
    ];

    public $timestamps = false;

    public function getPath()
    {
        return '/img'
        . DIRECTORY_SEPARATOR
        . 'products'
        . DIRECTORY_SEPARATOR
        . $this->cover;
    }
}