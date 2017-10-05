<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Titles extends Model
{
    protected $table = 'titles';

    protected $fillable = [
        'site_id',
        'key',
        'value'
    ];

    const TILE_MIME = 'title_mime';

    const TILE_REVIEWS = 'title_reviews';

    const TILE_PRODUCT = 'title_product';

    const HEADER_DOWN_BUTTON = 'header_down_button';

    const TITLE_DOWN_BUTTON = 'title_down_button';

    const URL_DOWN_BUTTON = 'url_down_button';

    const TITLE_YANDEX_METRIKA = 'metrika';

    const TITLE_FOOTER = 'title_footer';

    const LOGO_URL = 'logo_url';

    public static function getKeys()
    {
        return [
            self::TILE_MIME => 1,
            self::TILE_PRODUCT => 2,
            self::TITLE_DOWN_BUTTON => 3,
            self::TITLE_YANDEX_METRIKA => 5,
            self::TILE_REVIEWS => 7,
            self::TITLE_FOOTER => 9,
            self::URL_DOWN_BUTTON => 11,
            self::HEADER_DOWN_BUTTON => 15,
            self::LOGO_URL => 17
        ];
    }
}
