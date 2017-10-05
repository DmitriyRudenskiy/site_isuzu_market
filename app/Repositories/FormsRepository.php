<?php
namespace App\Repositories;


use App\Entities\Forms as Model;
use Prettus\Repository\Eloquent\BaseRepository;

class FormsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Model::class;
    }

    public function getList()
    {
        $list = Model::where('visible', 1)
            ->orderBy('priority', 'desc')
            ->get();

        if ($list === null) {
            return [];
        }

        return $list->toArray();
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

    public function getForm()
    {
        return $this->orderBy('id', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true,
                    'in_modal' => false
                ]
            )
            ->first();
    }

    public function getModalForm()
    {
        return $this->orderBy('id', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true,
                    'in_modal' => true
                ]
            )
            ->first();
    }
}
