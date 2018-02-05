<?php
namespace App\Repositories;

use App\Entities\Parts;
use Prettus\Repository\Eloquent\BaseRepository;

class PartsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Parts::class;


    }

    public function add(array $data)
    {
        try {
            return $this->create($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return null;
    }
}
