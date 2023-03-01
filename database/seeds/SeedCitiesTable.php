<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Seeder;
use Pp\Kistochki\Models\City;

class SeedCitiesTable extends Seeder
{
    public function run()
    {
        $cities = [
            [
                'title' => 'Санкт-Петербург',
                'y_city_id' => 1,
                'status' => true
            ],
            [
                'title' => 'Москва',
                'y_city_id' => 2,
                'status' => true
            ],
            [
                'title' => 'Тюмень',
                'y_city_id' => 42,
                'status' => true
            ],
            [
                'title' => 'Химки',
                'y_city_id' => 90,
                'status' => true
            ],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(['title' => $city['title']], array_merge($city, ['code' => Str::slug($city['title'])]));
        }
    }
}
