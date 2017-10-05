<?php
namespace App\Repositories;

use App\Entities\Menu;
use App\Entities\TypeItemMenuInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class MenuRepository extends BaseRepository implements TypeItemMenuInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return Menu::class;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        $data = [
            'type_id' => self::TYPE_LOGO,
            'site_id' => env('APP_DOMAIN_ID')
        ];

        $logo = $this->findWhere($data)->first();

        if ($logo === null) {
            $data['title'] = '-';
            $data['url'] = '-';
            $logo = $this->create($data);
        }

        return $logo;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        $data = [
            'type_id' => self::TYPE_PHONE,
            'site_id' => env('APP_DOMAIN_ID')
        ];

        $phone = $this->findWhere($data)->first();

        if ($phone === null) {
            $data['title'] = '-';
            $data['url'] = '-';
            $phone = $this->create($data);
        }

        return $phone;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        $data = [
            'type_id' => self::TYPE_ITEM,
            'site_id' => env('APP_DOMAIN_ID')
        ];


        return $this->orderBy('priority', 'desc')->findWhere($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $data['type_id'] = self::TYPE_ITEM;
        $data['visible'] = true;
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);;
    }
}
