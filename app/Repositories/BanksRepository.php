<?php
namespace App\Repositories;

use App\Entities\Banks;
use Prettus\Repository\Eloquent\BaseRepository;

class BanksRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Banks::class;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->all();
    }

    /**
     * @param $bankId
     * @return mixed
     */
    public function get($bankId)
    {
        return $this->find($bankId);
    }
}
