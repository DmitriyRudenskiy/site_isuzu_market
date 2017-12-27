<?php
namespace App\Repositories;

use App\Entities\Products;
use Prettus\Repository\Eloquent\BaseRepository;

class TonsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Products::class;
    }

    public function getList()
    {
        return [35, 52, 75, 95, 120, 180];
    }
}
