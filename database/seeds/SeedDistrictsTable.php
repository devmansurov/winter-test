<?php

namespace Pp\Kistochki\Database\Seeds;

use Seeder;
use Pp\Kistochki\Models\District;
use Pp\Kistochki\Models\DistrictCategory;

class SeedDistrictsTable extends Seeder
{
    public function run()
    {
        $districts = [
            [
                'title' => 'Площадь Восстания',
                'is_metro' => true
            ],
            [
                'title' => 'Московская',
                'is_metro' => true
            ],
            [
                'title' => 'Маяковская',
                'is_metro' => true
            ],
            [
                'title' => 'Лиговский проспект',
                'is_metro' => true
            ],
            [
                'title' => 'Проспект Славы',
                'is_metro' => true
            ],
            [
                'title' => 'Колпино',
                'is_metro' => false
            ]
        ];

        foreach ($districts as $district) {
            DistrictCategory::updateOrCreate(['title' => $district['title']], $district);
        }
    }
}
