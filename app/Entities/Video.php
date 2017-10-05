<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $fillable = [
        'site_id',
        'visible',
        'title',
        'description',
        'url'
    ];
}
