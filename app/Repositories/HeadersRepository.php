<?php
namespace App\Repositories;

use App\Entities\Headers;
use Prettus\Repository\Eloquent\BaseRepository;

class HeadersRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Headers::class;
    }

    public function get()
    {
        $header = $this->orderBy('id')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true
                ]
            )
            ->first();

        if ($header === null) {
            $header = new Headers();
        }

        return $header->toArray();
    }

    public function getList()
    {
        return $this->orderBy('id')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                ]
            );
    }

    public function add(array $data)
    {
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);
    }

    public function show($id)
    {
        if ($id < 1) {
            return null;
        }

        // прячем все остальные
        $this->updateOrCreate(
            [
                'site_id' => env('APP_DOMAIN_ID')
            ],
            [
                'visible' => false
            ]
        );

        // показываем
        $this->update( ['visible' => true], $id);
    }
}
