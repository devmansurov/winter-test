<?php

namespace Pp\Kistochki\Classes;
use Config;
use Pp\Kistochki\Enums\TagType;

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

    public static function getTagType()
    {
      $uri = request()->path();
      $is = fn($st) => str_contains($uri, "kistochki/$st");
      if($is("reviews")) return TagType::REVIEW;
      if($is("services")) return TagType::SERVICE;
      if($is("portfolios")) return TagType::PORTFOLIO;
      if($is("jobs")) return TagType::JOB;
      if($is("promotions")) return TagType::PROMOTION;
      throw new \RuntimeException("Tag type is undefined.");
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

    public static function getUserSettings(\Backend\Models\User $user, $key = null, $default = null)
    {
      $userPreference = \Backend\Models\UserPreference::forUser($user);
      $userSettings = (array) $userPreference->get('pp::kistochki.settings', []);

      return $key ? (isset($userSettings[$key]) ? $userSettings[$key] : $default) : $userSettings;
    }

    public static function getValidationRules($fields)
    {
      $allRules = [
        'title' => [
          'required',
          'min:3',
          'max:80'
        ],
        'slug' => [
          'required',
          'min:3',
          'max:80'
        ],
        'menu_title' => [
          'required',
          'min:3',
          'max:80'
        ],
        'column' => [
          'required',
          'numeric',
          'min:1',
          'max:3',
        ],
      ];

      $rules = [];

      foreach ($fields as $key => $value) {
        if(isset($allRules[$key])) $rules[$key] = $allRules[$key];
      }

      return $rules;
    }
}
