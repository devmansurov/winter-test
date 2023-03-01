<?php

namespace Pp\Kistochki;

use Backend;
use System\Classes\PluginBase;
use Backend\Models\User;
use Backend\Models\UserPreference;
use Pp\Kistochki\Classes\Helper;

class Plugin extends PluginBase
{
    public function boot()
    {
        User::extend(function ($model) {
            $model->bindEvent('model.afterCreate', function () use ($model) {
                UserPreference::forUser($model)->set('backend::backend.preferences', [
                    'locale' => 'ru',
                    'fallback_locale' => 'en',
                    "timezone" => "Europe\/Moscow"
                ]);
            });
        });
    }

    public function pluginDetails()
    {
        return [
            'name' => Helper::lang('plugin.name'),
            'description' => Helper::lang('plugin.description'),
            'author' => Helper::lang('plugin.author'),
            'icon' => 'icon-leaf',
            'homepage' => Helper::lang('plugin.homepage')
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        
    }

    public function registerNavigation()
    {
        $menuItems = [
            "hits" => [
                'label'       => Helper::lang('hits.multiple'),
                'url'         => Backend::url("pp/kistochki/hits"),
                'icon'        => 'icon-map-marker',
            ],
            "cities" => [
                'label'       => Helper::lang('cities.multiple'),
                'url'         => Backend::url("pp/kistochki/cities"),
                'icon'        => 'icon-map-marker',
            ],
            "districts" => [
                'label'       => Helper::lang('district.multiple'),
                'url'         => Backend::url("pp/kistochki/districts"),
                'icon'        => 'icon-map-marker',
            ],
            "saloons" => [
                'label'       => Helper::lang('saloon.multiple'),
                'url'         => Backend::url("pp/kistochki/saloons"),
                'icon'        => 'icon-book',
            ],
            "services" => [
                'label'       => Helper::lang('service.multiple'),
                'url'         => Backend::url("pp/kistochki/services"),
                'icon'        => 'icon-book',
            ],
            "reviews" => [
                'label'       => Helper::lang('review.multiple'),
                'url'         => Backend::url("pp/kistochki/reviews"),
                'icon'        => 'icon-book',
            ],
            "portfolios" => [
                'label'       => Helper::lang('portfolio.multiple'),
                'url'         => Backend::url("pp/kistochki/portfolios"),
                'icon'        => 'icon-book',
            ],
            "news" => [
                'label'       => Helper::lang('news.multiple'),
                'url'         => Backend::url("pp/kistochki/news"),
                'icon'        => 'icon-book',
            ],
            "promotions" => [
                'label'       => Helper::lang('promotion.multiple'),
                'url'         => Backend::url("pp/kistochki/promotions"),
                'icon'        => 'icon-book',
                'permissions' => ['admin_kistochki, developer_kistochki'],
                'sideMenu' => [
                    'side-menu-item' => [
                        'label'       => Helper::lang('promotion.new'),
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('pp/kistochki/promotions/create'),
                    ],
                ],
            ]
        ];

        return $menuItems;
    }

    public function registerReportWidgets()
    {

    }
}
