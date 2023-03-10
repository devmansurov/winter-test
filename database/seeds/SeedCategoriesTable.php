<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Seeder;
use Pp\Kistochki\Models\Category;
use Pp\Kistochki\Enums\CategoryType;

class SeedCategoriesTable extends Seeder
{
    public function run()
    {
        $serviceCategories = $this->getServiceCategories();
        $categories = [];

        foreach ($serviceCategories as $category) {
            $categories[] = [
                'title' => $category['title'],
                'slug' => Str::slug($category['title']),
                // 'type' => CategoryType::SERVICE
            ];
        }

        Category::insert($categories);
    }

    public function getServiceCategories()
    {
        return array(
            0 =>
            array(
              'id' => 9416825,
              'title' => 'Молчаливый мастер',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 15,
            ),
            1 =>
            array(
              'id' => 7092629,
              'title' => 'Популярные услуги',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 14,
            ),
            2 =>
            array(
              'id' => 7092228,
              'title' => 'Эксклюзивные услуги',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 13,
            ),
            3 =>
            array(
              'id' => 7092623,
              'title' => 'Маникюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 12,
            ),
            4 =>
            array(
              'id' => 7092627,
              'title' => 'Педикюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 11,
            ),
            5 =>
            array(
              'id' => 7092628,
              'title' => 'Покрытия',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 10,
            ),
            6 =>
            array(
              'id' => 7092621,
              'title' => 'Дизайн',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 9,
            ),
            7 =>
            array(
              'id' => 7092630,
              'title' => 'Снятие покрытия',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 8,
            ),
            8 =>
            array(
              'id' => 7092624,
              'title' => 'Наращивание',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 7,
            ),
            9 =>
            array(
              'id' => 7092626,
              'title' => 'Одновременные услуги в 4 руки',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 6,
            ),
            10 =>
            array(
              'id' => 7092631,
              'title' => 'Уходы',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 5,
            ),
            11 =>
            array(
              'id' => 7092279,
              'title' => 'Брови и ресницы',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 4,
            ),
            12 =>
            array(
              'id' => 7092622,
              'title' => 'Коррекционный педикюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 3,
            ),
            13 =>
            array(
              'id' => 10880980,
              'title' => 'Прическа',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
            14 =>
            array(
              'id' => 10881058,
              'title' => 'Укладка',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
            15 =>
            array(
              'id' => 10881089,
              'title' => 'Плетение кос',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
        );
    }
}
