<?php

namespace Pp\Kistochki;

use Backend;
use System\Classes\PluginBase;
use Backend\Models\User;
use Backend\Models\UserPreference;
use Pp\Kistochki\Classes\Menu;
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
        return [
            'settings' => [
                'label'       => 'Настройки',
                'description' => 'Управление настройками плагина Кисточки',
                'category'    => 'Кисточки',
                'icon'        => 'icon-cog',
                'class'       => 'Pp\Kistochki\Models\Settings',
                'order'       => 500,
                'keywords'    => 'кисточки настройки'
            ]
        ];
    }

    public function registerNavigation()
    {
        return Menu::register();
    }

    public function registerReportWidgets()
    {

    }
}
