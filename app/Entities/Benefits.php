<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Benefits extends Model implements  PrefixInterface
{
    protected $table = 'benefits';

    protected $fillable = [
        'site_id',
        'visible',
        'priority',
        'cover',
        'title',
        'description'
    ];

    public function getPath()
    {
        return '/img'
            . DIRECTORY_SEPARATOR
            . self::PREFIX_BENEFITS
            . DIRECTORY_SEPARATOR
            . $this->cover;
    }
}
