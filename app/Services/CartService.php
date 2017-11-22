<?php
namespace App\Services;

use App\Entities\Car\Prices;

class CartService
{
    const DELIMITER = '_';

    const INDEX = 'front_cart';

    /**
     * @param Prices $prices
     * @return bool
     */
    public function add(Prices $prices)
    {
        $data = [$prices->type_id, $prices->base_id];
        $key = implode(self::DELIMITER, $data);

        $products = session(self::INDEX);

        if (!empty($products[$key])) {
            return false;
        }

        if (!is_array($products)) {
            $products = [];
        }

        $products[$key] = $data;

        session([self::INDEX => $products]);

        return true;
    }

    /**
     * @return Prices[]
     */
    public function get()
    {
        $entity = new Prices();

        $list = session(self::INDEX);

        if (empty($list)) {
            return null;
        }

        $result = [];

        foreach ($list as $value) {
            $result[] = $entity->where(["type_id" => $value[0], "base_id" => $value[1]])->first();
        }

        return $result;
    }
}