<?php
namespace App\Repositories;

use App\Entities\Label;
use App\Entities\TypeParametersInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use DateTime;

class LabelRepository extends BaseRepository implements TypeParametersInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return Label::class;
    }

    public function get()
    {
        $list = $this->orderBy('visible', 'desc')
            ->orderBy('priority', 'desc')
            ->findWhere(['site_id' => env('APP_DOMAIN_ID')]);

        if ($list->count() < 1) {
            $this->fill();

            return $this->orderBy('visible', 'desc')
                ->orderBy('priority', 'desc')
                ->findWhere(['site_id' => env('APP_DOMAIN_ID')]);
        }

        return $list;
    }

    public function getList()
    {
        return $this->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true,
                    'type_id' => self::TYPE_LIST
                ],
                [
                    "visible",
                    "name",
                    "label"
                ]
            )
            ->toArray();
    }

    public function getButton()
    {
        return $this->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID'),
                    'visible' => true,
                    'type_id' => self::TYPE_BUTTON
                ],
                [
                    "visible",
                    "name",
                    "label"
                ]
            )
            ->first();
    }

    public function getAllList()
    {
        $list = $this->orderBy('visible', 'desc')
            ->orderBy('priority', 'desc')
            ->findWhere(
                [
                    'site_id' => env('APP_DOMAIN_ID')
                ],
                [
                    "visible",
                    "name",
                    "label"
                ]
            );


        if ($list === null) {
            return [];
        }

        return $list->toArray();
    }

    public function add(array $data)
    {
        $data['site_id'] = env('APP_DOMAIN_ID');

        return $this->create($data);
    }

    protected function fill()
    {
        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'equipment',
                'label' => 'Комплектация',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'engine',
                'label' => 'Мотор',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'power',
                'label' => 'Мощность',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'transmission',
                'label' => 'Трансмиссия',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'drive_unit',
                'label' => 'Привод',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'body_type',
                'label' => 'Тип кузова',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_LIST,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'colour',
                'label' => 'Цвет',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );

        Label::create(
            [
                'type_id' => self::TYPE_BUTTON,
                'site_id' => env('APP_DOMAIN_ID'),
                'visible' => true,
                'name' => 'button',
                'label' => 'Купить',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        );
    }
}
