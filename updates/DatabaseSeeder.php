<?php namespace Pp\Kistochki\Updates;

use Str;
use Seeder;
use Eloquent;
use Pp\Kistochki\Classes\Helper;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return string
     */
    public function run()
    {
        $seeders = Helper::getConfig('seeders', []);
        Eloquent::unguarded(function () use ($seeders) {
            foreach ($seeders as $seed) {
                $this->call($seed['class']);
            }
        });
    }
}
