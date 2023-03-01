<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Управление автозаполнителями
    |--------------------------------------------------------------------------
    |
    | Эти настройки могут включить или отключить запуск автозаполнителя
    | при запуске команды winter:up. Для отключения автозаполнителя
    | просто необходимо комментировать автозаполнител в массиве ниже
    */

    'seeders' => [
      'cities' => [
        'title' => 'Автозаполнитель список городов',
        'class' => \Pp\Kistochki\Database\Seeds\SeedCitiesTable::class,
      ],
      'districts' => [
        'title' => 'Автозаполнитель список метро',
        'class' => \Pp\Kistochki\Database\Seeds\SeedDistrictsTable::class,
      ],
      'tags' => [
        'title' => 'Автозаполнитель тегов',
        'class' => \Pp\Kistochki\Database\Seeds\SeedTagsTable::class,
      ],
      'categories' => [
        'title' => 'Автозаполнитель категорий',
        'class' => \Pp\Kistochki\Database\Seeds\SeedCategoriesTable::class,
      ],
      'saloons' => [
        'title' => 'Автозаполнитель салонов',
        'class' => \Pp\Kistochki\Database\Seeds\SeedSaloonsTable::class,
      ],
      'services' => [
        'title' => 'Автозаполнитель услуг',
        'class' => \Pp\Kistochki\Database\Seeds\SeedServicesTable::class,
      ],
      'reviews' => [
        'title' => 'Автозаполнитель отзывов',
        'class' => \Pp\Kistochki\Database\Seeds\SeedReviewsTable::class,
      ],
      'posts' => [
        'title' => 'Автозаполнитель фейковых вакансии, акции, карты лояльности, абонементы, сертификаты, гарантия и качество',
        'class' => \Pp\Kistochki\Database\Seeds\SeedPostsTable::class,
      ],
      'users' => [
        'title' => 'Автозаполнитель пользователей',
        'class' => \Pp\Kistochki\Database\Seeds\SeedUsers::class,
      ]
    ]
];
