<?php

namespace Pp\Kistochki\Classes;
use Config;

class Helper
{
    public static function getPostTypes()
    {
        return [
          [
            'id' => 100,
            'title' => 'Акции',
            'type' => 'promotion'
          ],
          [
            'id' => 101,
            'title' => 'Абонементы',
            'type' => 'abonement'
          ],
          [
            'id' => 102,
            'title' => 'Вакансии',
            'type' => 'job'
          ],
          [
            'id' => 103,
            'title' => 'Страницы',
            'type' => 'page'
          ],
          [
            'id' => 104,
            'title' => 'Новости',
            'type' => 'news'
          ],
          [
            'id' => 105,
            'title' => 'Слайдеры',
            'type' => 'slider'
          ]
        ];
    }

    public static function getPostType($type)
    {
        $postTypes = self::getPostTypes();
        if (is_numeric($type) || is_string($type)) {
            foreach ($postTypes as $postType) {
                if ($postType['id'] == $type || $postType['type'] == $type) {
                    return $postType;
                }
            }
        }
        throw new \RuntimeException("Post type \"$type\" is undefined.");
    }

    public static function isRoute($name)
    {
        return request()->segment(4) == $name;
    }

    public static function getRoute()
    {
        return request()->segment(4);
    }

    public static function getConfig($key, $default = null)
    {
        return Config::get("pp.kistochki::{$key}", $default);
    }

    public static function lang($key, $replace = [], $locale = 'ru')
    {
        $reformattedKey = "pp.kistochki::lang.{$key}";
        $translation = __($reformattedKey, $replace, $locale);
        if($reformattedKey == $translation) {
          try {
            $lang = require(__DIR__ ."/../lang/$locale/lang.php");
            $translation = array_get($lang, $key, $reformattedKey);
          } catch (\Exception $e) {
            $translation = $reformattedKey;
          }
        }
        return $translation;
    }
}
