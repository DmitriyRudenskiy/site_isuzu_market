<?php
namespace App\Repositories;

use App\Entities\Benefits;
use Prettus\Repository\Eloquent\BaseRepository;

class BenefitsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Benefits::class;
    }

    /**
     * @return Benefits[]|null
     */
    public function getList()
    {
        return $this->orderBy('priority', 'desc')->findWhere(
                [
                    'visible' => true,
                    'site_id' => env('APP_DOMAIN_ID')
                ]
            );
    }

    public function getAllList()
    {
        return $this->orderBy('visible', 'desc')
            ->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID')
                ]
            );
    }

    public function add(array $data)
    {
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);
    }
}
