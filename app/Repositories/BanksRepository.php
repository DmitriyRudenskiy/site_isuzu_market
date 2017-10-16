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


    public function getList()
    {
        return $this->getData();
    }

    public function get($bankId)
    {
        foreach($this->getData() as $value) {
            if ($value["id"] == $bankId) {
                return (object)$value;
            }
        }

        return null;
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "title" => "Сбербанк",
                "image" => "/img/bank/logo_103.jpg",
                "precent" => 6.5
            ],
            [
                "id" => 2,
                "title" => "Балтийский лизинг",
                "image" => "/img/bank/logo_102.jpg",
                "precent" => 7.7
            ],
            [
                "id" => 3,
                "title" => "Siemens",
                "image" => "/img/bank/logo_101.jpg",
                "precent" => 8.5
            ],
            [
                "id" => 4,
                "title" => "Европлан",
                "image" => "/img/bank/logo_104.jpg",
                "precent" => 8
            ],
            [
                "id" => 5,
                "title" => "ВТБ",
                "image" => "/img/bank/logo_105.jpg",
                "precent" => 7
            ]
        ];
    }
}
