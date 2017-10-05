<?php
namespace App\Repositories;

use App\Entities\Reviews;
use Prettus\Repository\Eloquent\BaseRepository;

class ReviewsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Reviews::class;
    }

    public function getList()
    {
        return $this->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true
                ]
            );
    }

    public function getAllList()
    {
        return $this->orderBy('priority', 'desc')
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
