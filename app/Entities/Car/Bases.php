<?php

namespace App\Entities\Car;

use Illuminate\Database\Eloquent\Model;

class Bases extends Model
{
    protected $table = "car_bases";
    
    protected $fillable = [
        "position",
        "category_id",
        "title"
    ];

    public $timestamps = false;

    public function getCategory()
    {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public function getPrice($typeId)
    {
        return $this->belongsTo(Prices::class, 'id', 'base_id')
            ->where('type_id', $typeId);
    }
}