<?php
namespace App\Repositories\Car;

use App\Entities\Car\Types;
use Prettus\Repository\Eloquent\BaseRepository;

class TypesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Types::class;
    }

    public function getList()
    {
        return $this->findWhere(["visible" => true]);
    }
}
