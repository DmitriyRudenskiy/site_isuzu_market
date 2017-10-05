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

    public function getList()
    {
        return $this->orderBy('priority', 'desc')
                ->findWhere(
                    [
                        'site_id' => env('APP_DOMAIN_ID'),
                        'visible' => true
                    ]
                )
            ->toArray();
    }

    public function getListAll()
    {
        return $this->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID')
                ]
            )
            ->toArray();
    }

    public function add(array $data)
    {
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);
    }
}
