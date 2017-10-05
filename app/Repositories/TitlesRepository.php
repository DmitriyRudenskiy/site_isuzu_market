<?php
namespace App\Repositories;

use App\Entities\Titles;
use Prettus\Repository\Eloquent\BaseRepository;

class TitlesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Titles::class;
    }

    public function getList()
    {
        $result = [];
        $list = $this->findWhere(['site_id' => env('APP_DOMAIN_ID')], ['key', 'value'] );
        $key = Titles::getKeys();

        foreach ($list as $value) {
            if (isset($key[$value->key])) {
                $result[$value->key] = $value->value;
            }
        }

        return $result;
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
}
