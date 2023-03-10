<?php

namespace Pp\Kistochki\Classes;

use Config;
use Backend;

class Menu
{
    public static function register()
    {
        return array_merge(
            self::pages()
        );
    }

    private static function pages()
    {
        return [
            "menus" => [
                'label'       => "Меню",
                'url'         => Backend::url("pp/kistochki/menus"),
                'icon'        => 'icon-list',
                'permissions' => ['admin_kistochki, developer_kistochki'],
                'sideMenu' => [
                    'menus' => [
                        'label'       => "Меню",
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('pp/kistochki/menus'),
                    ],
                    'goals' => [
                        'label'       => "Наши цели",
                        'icon'        => 'icon-check-square',
                        'url'         => Backend::url('pp/kistochki/goals'),
                    ],
                    'sliders' => [
                        'label'       => "Слайдеры",
                        'icon'        => 'icon-sliders',
                        'url'         => Backend::url('pp/kistochki/sliders'),
                    ],
                    "callbacks" => [
                        'label'       => 'Обратный звонок',
                        'url'         => Backend::url("pp/kistochki/callbacks"),
                        'icon'        => 'icon-phone',
                    ],
                    "settings" => [
                        'label'       => 'Настройки',
                        'url'         => Backend::url("pp/kistochki/settings"),
                        'icon'        => 'icon-cog',
                    ],
                ],
            ],
            "cities" => [
                'label'       => Helper::lang('cities.multiple'),
                'url'         => Backend::url("pp/kistochki/cities"),
                'icon'        => 'icon-map-marker',
                'sideMenu' => [
                    "cities" => [
                        'label'       => Helper::lang('cities.multiple'),
                        'url'         => Backend::url("pp/kistochki/cities"),
                        'icon'        => 'icon-map-marker',
                    ],
                    "district-lines" => [
                        'label'       => 'Линии метро',
                        'url'         => Backend::url("pp/kistochki/districtlines"),
                        'icon'        => 'icon-train',
                    ],
                    "district-stations" => [
                        'label'       => 'Станции метро',
                        'url'         => Backend::url("pp/kistochki/districtstations"),
                        'icon'        => 'icon-train',
                    ],
                    // "districts" => [
                    //     'label'       => 'Станции метро',
                    //     'url'         => Backend::url("pp/kistochki/districts"),
                    //     'icon'        => 'icon-train',
                    // ],
                    // "district-categories" => [
                    //     'label'       => 'Линии метро',
                    //     'url'         => Backend::url("pp/kistochki/districtcategories"),
                    //     'icon'        => 'icon-train',
                    // ],
                ]

            ],
            "saloons" => [
                'label'       => Helper::lang('saloon.multiple'),
                'url'         => Backend::url("pp/kistochki/saloons"),
                'icon'        => 'icon-paint-brush',
            ],
            "services" => [
                'label'       => Helper::lang('service.multiple'),
                'url'         => Backend::url("pp/kistochki/services"),
                'icon'        => 'icon-cubes',
                'sideMenu' => [
                    'services' => [
                        'label'       => Helper::lang('service.multiple'),
                        'icon'        => 'icon-th',
                        'url'         => Backend::url('pp/kistochki/services'),
                    ],
                    'categories' => [
                        'label'       => "Категории",
                        'icon'        => 'icon-stop',
                        'url'         => Backend::url('pp/kistochki/categories'),
                    ],
                    "hits" => [
                        'label'       => Helper::lang('hits.multiple'),
                        'url'         => Backend::url("pp/kistochki/hits"),
                        'icon'        => 'icon-trello',
                    ],
                ],
            ],
            "reviews" => [
                'label'       => Helper::lang('review.multiple'),
                'url'         => Backend::url("pp/kistochki/reviews"),
                'icon'        => 'icon-commenting',
            ],
            "portfolios" => [
                'label'       => Helper::lang('portfolio.multiple'),
                'url'         => Backend::url("pp/kistochki/portfolios"),
                'icon'        => 'icon-suitcase',
            ],
            "news" => [
                'label'       => Helper::lang('news.multiple'),
                'url'         => Backend::url("pp/kistochki/news"),
                'icon'        => 'icon-newspaper-o',
            ],
            "promotions" => [
                'label'       => Helper::lang('promotion.multiple'),
                'url'         => Backend::url("pp/kistochki/promotions"),
                'icon'        => 'icon-bullhorn',
                'permissions' => ['admin_kistochki, developer_kistochki'],
                'sideMenu' => [
                    'side-menu-item' => [
                        'label'       => Helper::lang('promotion.new'),
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('pp/kistochki/promotions/create'),
                    ],
                ],
            ],
            "jobs" => [
                'label'       => 'Вакансии',
                'url'         => Backend::url("pp/kistochki/jobs"),
                'icon'        => 'icon-briefcase',
            ],
        ];
    }
}
