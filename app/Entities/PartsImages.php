<?php

namespace App\Entities;

use App\Entities\Car\Types;
use Illuminate\Database\Eloquent\Model;

class PartsImages extends Model
{
    protected $table = "parts_images";

    protected $fillable = [
        "part_id",
        "visible",
        "priority",
        "cover",
        "file_path",
        "name"
    ];

    public function getPath()
    {
        return '/img'
        . DIRECTORY_SEPARATOR
        . 'parts/images'
        . DIRECTORY_SEPARATOR
        . $this->part_id;
    }

    public function pathUrl()
    {
        if ($this->file_path !== null) {
            return $this->getPath() . DIRECTORY_SEPARATOR . $this->file_path;
        }
    }
}