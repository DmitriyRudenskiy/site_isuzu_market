<?php
namespace App\Repositories;

use App\Entities\Domains;
use App\Entities\Sites;
use Prettus\Repository\Eloquent\BaseRepository;

class SitesRepository extends BaseRepository
{
    const DEFAULT_DOMAIN_ID = 1;

    /**
     * @return string
     */
    public function model()
    {
        return Sites::class;
    }

    public function get($name)
    {
        $entity = $this->findWhere(
            [
                'name' => $name,
                'visible' => true
            ]
        )->first();

        if ($entity !== null) {
            return $entity->id;
        }

        return self::DEFAULT_DOMAIN_ID;
    }
}
