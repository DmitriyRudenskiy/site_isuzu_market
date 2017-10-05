<?php
namespace App\Repositories;

use App\Entities\Video;
use Prettus\Repository\Eloquent\BaseRepository;

class VideoRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Video::class;
    }

    public function get()
    {
        $video = $this->findWhere(
            [
                'visible' => true,
                'site_id' => env('APP_DOMAIN_ID')
            ]
        )->first();

        if ($video !== null) {
            return $video->toArray();
        }

        return [];
    }

    public function getAllList()
    {
        return $this->orderBy('visible', 'desc')
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
