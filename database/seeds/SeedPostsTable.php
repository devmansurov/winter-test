<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Faker;
use Seeder;
use Pp\Kistochki\Models\Post;
use Pp\Kistochki\Enums\PostType;

class SeedPostsTable extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        $jobs = [];

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(mt_rand(2, 4));
            $jobs[] = [
              'title' => $title,
              'slug' => Str::slug($title),
              'order' => mt_rand(0, 10),
              'type' => PostType::JOB
            ];
        }

        Post::insert($jobs);

        $promotions = [];

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence();
            $promotions[] = [
              'title' => $title,
              'slug' => Str::slug($title),
              'order' => mt_rand(0, 10),
              'type' => PostType::PROMOTION
            ];
        }

        Post::insert($promotions);

        $abonements = [];

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence();
            $abonements[] = [
              'title' => $title,
              'slug' => Str::slug($title),
              'order' => mt_rand(0, 10),
              'type' => PostType::ABONEMENT
            ];
        }

        Post::insert($abonements);

        $pages = [
          [
            'title' => 'Главная',
            'slug' => 'home',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Услуги и цены',
            'slug' => 'services',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Адреса студий',
            'slug' => 'saloons',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Отзывы',
            'slug' => 'reviews',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Портфолио',
            'slug' => 'portfolios',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Акции',
            'slug' => 'promotions',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Абонементы',
            'slug' => 'abonements',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Вакансии',
            'slug' => 'jobs',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Гарантия качество',
            'slug' => 'quality-assurance',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Сертификаты',
            'slug' => 'certificates',
            'type' => PostType::PAGE
          ],
          [
            'title' => 'Карты лояльности',
            'slug' => 'loyalty',
            'type' => PostType::PAGE
          ]
        ];

        foreach ($pages as $page) {
          Post::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
