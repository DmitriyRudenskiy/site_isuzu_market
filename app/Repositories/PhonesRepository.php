<?php
namespace App\Repositories;

use App\Entities\Phones;
use Prettus\Repository\Eloquent\BaseRepository;

class PhonesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Phones::class;
    }

    public function get()
    {
        return $this->orderBy('id', 'desc')
            ->paginate(15);
    }

    public function add(array $data)
    {
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);
    }
}
