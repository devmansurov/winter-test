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
              'static_id' => '1',
              'title' => 'Москва',
            ],
            [
              'static_id' => '2',
              'title' => 'Санкт-Петербург',
            ],
            [
              'static_id' => '3',
              'title' => 'Екатеринбург',
            ],
            [
              'static_id' => '88',
              'title' => 'Казань',
            ],
            [
              'static_id' => '66',
              'title' => 'Нижний Новгород',
            ],
            [
              'static_id' => '4',
              'title' => 'Новосибирск',
            ],
            [
              'static_id' => '78',
              'title' => 'Самара',
            ],
            [
              'static_id' => '95',
              'title' => 'Тюмень',
            ],
            [
              'static_id' => '1002',
              'title' => 'Минск',
            ],
            [
              'static_id' => '2077',
              'title' => 'Химки',
            ],
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(['title' => $city['title']], array_merge($city, ['slug' => Str::slug($city['title'])]));
        }
    }
}
