<?php
namespace App\Repositories;

use App\Entities\Products;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Products::class;
    }

    public function getListForSearch()
    {
        return $this->orderBy('price')->findWhere(['visible' => true]);
    }

    public function getListForSearchParams($types, $sort)
    {
        $query = Products::where('visible', '=', true);

        if (!empty($sort)) {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('price', 'asc');
        }

        if (!empty($types)) {
            $query->whereIn('type_id', $types);
        }

        return $query->get();
    }

    public function getProductsForHome()
    {
        $data = $this->getData();
        unset($data[0]);

        return $data;
    }

    public function getAllTypes()
    {
        return Products::select('type_id')
            ->where('visible', true)
            ->groupBy('type_id')
            ->get();
    }

    public function get($productId)
    {
        return $this->getData()[$productId - 1];
    }

    public function getList()
    {

    }

    public function add($key, $value)
    {
        $data = [
            'site_id' => env('APP_DOMAIN_ID'),
            'key' => $key
        ];

        $title = $this->findWhere($data)->first();


        if ($title !== null) {
            $this->update(['value' => $value], $title->id);
        } else {
            $data['value'] = $value;
            $title = $this->create($data);
        }

        return $title;
    }

    protected function getData()
    {
        return [
            [
                'id' => 1,
                'title' => 'ISUZU ELF 3.5 LONG',
                'price' => 2130000,
                'img' => '/img/catalog/2_1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'ISUZU ELF 7.5',
                'price' => 2670000,
                'img' => '/img/catalog/2_2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'ISUZU ELF 9.5 EXTRALONG',
                'price' => 3170000,
                'img' => '/img/catalog/2_3.jpg'
            ],
            /*
            [
                'id' => 4,
                'title' => 'GIGA 6x4 SHORT',
                'price' => 6640000,
                'img' => '/img/catalog/2_4.jpg'
            ],
            [
                'id' => 5,
                'title' => 'GIGA 6x4 NORMAL',
                'price' => 6690000,
                'img' => '/img/catalog/2_5.jpg'
            ],
            */
        ];
    }
}
