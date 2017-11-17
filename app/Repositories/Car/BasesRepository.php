<?php
namespace App\Repositories\Car;

use App\Entities\Car\Bases;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;

class BasesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Bases::class;
    }

    public function getList($typeId)
    {
        $sql = "SELECT b.*
                FROM car_bases b
                JOIN car_prices p ON p.base_id=b.id
                WHERE p.type_id=?
                ORDER BY b.category_id, b.position;";

        $results = DB::select(DB::raw($sql), [$typeId]);

        return $results;
    }
}
