<?php

namespace Pp\Kistochki\Classes;

use Model;
use Pp\Kistochki\Models\Settings;
use Winter\Storm\Database\Builder;
class BaseModel extends  Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;
    use \Winter\Storm\Database\Traits\Sluggable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Sortable',
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    /**
     * @var array Generate slugs for these attributes.
     */
    protected $slugs = ['slug' => 'title'];

    protected static function booted()
    {
        $user = \BackendAuth::getUser();
        if($user) {
            $defaultCity = Settings::get('defaultCity');
            $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
            self::addGlobalScope('globalCityFilter', function (Builder $builder) use($globalCity) {
                $model = $builder->getModel();
                $hasCityRelation = $model->belongsTo && array_key_exists('city', $model->belongsTo);
                if($hasCityRelation) {
                  $builder->where('city_id', $globalCity);
                }

                if(method_exists($model, 'addCityFilter')) {
                  $model->addCityFilter($builder, $globalCity);
                }
            });
        }
    }

    public function beforeSave()
    {
        if(isset($this->belongsTo) && array_key_exists('city', $this->belongsTo)) {
          $user = \BackendAuth::getUser();
          if($user) {
              $defaultCity = Settings::get('defaultCity');
              $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
              $this->city_id = $globalCity;
          }
        }
    }

    public $regex = [
      'title' => '/^(?![*=»\\\\|)+-.,?!:;&%])[a-zа-ё-.,?!+:;\'*=\\\\|()"&%«»#№\s\w]+(?<![*=#№«\\\\|(+,-])$/ius'
    ];

    public const HTML_TITLE_RULE = [
      'required',
      'min:3',
      'max:80',
      'regex:/^(?![*=»\\\\|)+-.,?!:;&%])[a-zа-ё-.,<\/>?!+:;\'*=\\\\|()"&%«»#№\s\w]+(?<![*=#№«\\\\|(+,-])$/ium'
    ];

    public const TITLE_RULE = [
      'required',
      'min:3',
      'max:80',
      'regex:/^(?![*=»\\\\|)+-.,?!:;&%])[a-zа-ё-.,?!+:;\'*=\\\\|()"&%«»#№\s\w]+(?<![*=#№«\\\\|(+,-])$/ius'
    ];
    
    public const SUBTITLE_RULE = [
      'min:3',
      'max:80',
      'regex:/^[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#\w\s№]+$/ius'
    ];

    public const SLUG_RULE = [
      'required',
      'min:3',
      'max:80',
      'regex:/^(?![._-])[a-z._-]+(?<![._-])$/ius',
    ];

    public const COLUMN_RULE = [
      'required',
      'numeric',
      'min:1',
      'max:3',
    ];

    public const EXCERPT_RULE = [
      'nullable',
      'min:5',
      'max:190',
    ];

    public const DESCRIPTION_RULE = [
      'nullable',
      'min:5',
      'max:65500',
    ];

    public const SORT_ORDER_RULE = [
      'required',
      'integer',
      'min:0',
      'max:10000',
    ];

    public const INFORMATION_RULE = [
      'required',
      'array',
      'min:1',
      'max:20',
    ];
 
    public const META_TITLE_RULE = self::TITLE_RULE;
    public const META_DESC_RULE = self::EXCERPT_RULE;

    public const STATUS_RULE = 'boolean';
}