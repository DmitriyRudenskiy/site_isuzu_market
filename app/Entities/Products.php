<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Products extends Model implements PrefixInterface, TypeParametersInterface
{
    protected $table = 'products';

    protected $fillable = [
        'site_id',
        'type_id',
        'is_small',
        'visible',
        'priority',
        'equipment',
        'engine',
        'power',
        'transmission',
        'drive_unit',
        'body_type',
        'colour',
        'button'
    ];

    public function getPath()
    {
        if (empty($this->photo)) {
            return null;
        }

        return '/img'
            . DIRECTORY_SEPARATOR
            . self::PREFIX_PRODUCTS
            . DIRECTORY_SEPARATOR
            . $this->photo;
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['path'] = $this->getPath();

        return $data;
    }
}
