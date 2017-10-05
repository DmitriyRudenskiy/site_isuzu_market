<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model implements  PrefixInterface
{
    protected $table = 'reviews';

    protected $fillable = [
        'site_id',
        'visible',
        'priority',
        'avatar',
        'name',
        'content',
        'url'
    ];

    public function getPath()
    {
        return '/img'
            . DIRECTORY_SEPARATOR
            . self::PREFIX_REVIEWS
            . DIRECTORY_SEPARATOR
            . $this->avatar;
    }
}
