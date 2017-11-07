<?php
namespace App\Repositories;

use App\Entities\Titles;
use App\Entities\Users;
use Prettus\Repository\Eloquent\BaseRepository;

class OptionsRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Users::class;
    }

    public function get($chassisId)
    {
        if ($chassisId < 1) {
            return [];
        }

        return $this->getData();
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
                "title" => "Дефлекторы на боковые стекла",
                "price" => 100
            ],
            [
                "id" => 2,
                "title" => "Дополнительный топливный бак",
                "price" => 100
            ],
            [
                "id" => 3,
                "title" => "Защита АКБ",
                "price" => 100
            ],
            [
                "id" => 4,
                "title" => "Защита задних фар",
                "price" => 100
            ],
            [
                "id" => 5,
                "title" => "Зеркала заднего вида с подогревом",
                "price" => 100
            ],
            [
                "id" => 6,
                "title" => "Инструментальный ящик",
                "price" => 100
            ],

            [
                "id" => 7,
                "title" => "Камера заднего вида с выводом изображения на монитор",
                "price" => 100
            ],
            [
                "id" => 8,
                "title" => "Конвектор",
                "price" => 100
            ],
            [
                "id" => 9,
                "title" => "Магнитола и CD/DVD-проигрыватель",
                "price" => 100
            ],
            [
                "id" => 10,
                "title" => "Переоборудование автомобиля под опасные грузы",
                "price" => 100
            ],
            [
                "id" => 11,
                "title" => "Предпусковые подогреватели Eberspacher,  Webasto",
                "price" => 100
            ],
            [
                "id" => 12,
                "title" => "Световые спецсигналы",
                "price" => 100
            ],
            [
                "id" => 13,
                "title" => "Сигнализация",
                "price" => 100
            ],
            [
                "id" => 14,
                "title" => "Системы слежения ГЛОНАСС и GPS",
                "price" => 100
            ],
            [
                "id" => 15,
                "title" => "Спойлер",
                "price" => 100
            ],
            [
                "id" => 16,
                "title" => "Удлинение кронштейнов зеркал заднего вида ",
                "price" => 100
            ],
            [
                "id" => 17,
                "title" => "Установка тахографа ",
                "price" => 100
            ],

        ];
    }
}
