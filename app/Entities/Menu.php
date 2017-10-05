<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model implements PrefixInterface, TypeItemMenuInterface
{
    protected $table = 'menu';

    protected $fillable = [
        'site_id',
        'visible',
        'priority',
        'type_id',
        'title',
        'url'
    ];

    /**
     * @return bool
     */
    public function isLogo()
    {
        return $this->type_id == self::TYPE_LOGO;
    }

    /**
     * @return bool
     */
    public function isItem()
    {
        return $this->type_id == self::TYPE_ITEM;
    }

    /**
     * @return bool
     */
    public function isPhone()
    {
        return $this->type_id == self::TYPE_PHONE;
    }

    public function getPath()
    {
        return '/img'
            . DIRECTORY_SEPARATOR
            . self::PREFIX_MENU_LOGO
            . DIRECTORY_SEPARATOR
            . $this->title;
    }
}
