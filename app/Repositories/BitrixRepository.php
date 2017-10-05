<?php
namespace App\Repositories;

use App\Entities\Bitrix;
use Prettus\Repository\Eloquent\BaseRepository;

class BitrixRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Bitrix::class;
    }

    /**
     * @return Bitrix
     */
    public function get()
    {
        $entity = Bitrix::first();

        if ($entity === null) {
            return new Bitrix();
        }

        return $entity;
    }

    /**
     * @param string $accessToken
     * @param string $refreshToken
     */
    public function refresh($accessToken, $refreshToken)
    {
        $model = $this->get();
        $model->access_token = $accessToken;
        $model->refresh_token = $refreshToken;

        $model->save();
    }
}
