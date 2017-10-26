<?php
namespace App\Repositories;

use App\Entities\Titles;
use App\Entities\Users;
use Prettus\Repository\Eloquent\BaseRepository;

class TypesRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Users::class;
    }

    public function getAll()
    {
        return $this->getData();
    }

    protected function getData()
    {
        return [
            [
                "id" => 1,
                "image" => "/img/configurator/types/1.png",
                "title" => "Пикап"
            ],
            [
                "id" => 2,
                "image" => "/img/configurator/types/2.png",
                "title" => "Шасси"
            ],
            [
                "id" => 3,
                "image" => "/img/configurator/types/3.png",
                "title" => "Фургон промтоварный"
            ],
            [
                "id" => 4,
                "image" => "/img/configurator/types/4.png",
                "title" => " Изотермический фургон"
            ],
            [
                "id" => 5,
                "image" => "/img/configurator/types/5.png",
                "title" => "-"
            ],
            [
                "id" => 6,
                "image" => "/img/configurator/types/6.png",
                "title" => "Открытый бортовой<br> автомобиль"
            ],
            [
                "id" => 7,
                "image" => "/img/configurator/types/7.png",
                "title" => "Тентованный бортовой<br> автомобиль"
            ],
            [
                "id" => 8,
                "image" => "/img/configurator/types/8.png",
                "title" => "Бортовой автомобиль с КМУ"
            ],
            [
                "id" => 9,
                "image" => "/img/configurator/types/9.png",
                "title" => "Автоэвакуатор"
            ],
            [
                "id" => 10,
                "image" => "/img/configurator/types/10.png",
                "title" => "Автогидроподъемник"
            ],
            [
                "id" => 11,
                "image" => "/img/configurator/types/11.png",
                "title" => "Мусоровоз"
            ],
            [
                "id" => 12,
                "image" => "/img/configurator/types/12.png",
                "title" => "Автоцистерна"
            ],
            [
                "id" => 13,
                "image" => "/img/configurator/types/13.png",
                "title" => "Автобетоносмеситель"
            ],
            [
                "id" => 14,
                "image" => "/img/configurator/types/14.png",
                "title" => "Самосвал"
            ],
            [
                "id" => 15,
                "image" => "/img/configurator/types/15.png",
                "title" => "Мультилифт / Бункеровоз"
            ],
            [
                "id" => 16,
                "image" => "/img/configurator/types/16.png",
                "title" => "Седельный тягач"
            ],
        ];
    }
}
