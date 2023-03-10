<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Classes\Helper;
use Winter\Storm\Database\Builder;

/**
 * Model
 */
class Review extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_reviews';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphToMany = [
        'tags' => [
            'Pp\Kistochki\Models\Tag',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable',
            'scope' => 'isReview'
        ],
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    protected static function booted()
    {
        $user = \BackendAuth::getUser();
        if($user) {
            $defaultCity = Settings::get('defaultCity');
            $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
            Review::addGlobalScope('globalCityFilter', function (Builder $builder) use($globalCity) {
                $builder->where('city_id', $globalCity);
            });
        }
    }

    public function beforeSave()
    {
        $user = \BackendAuth::getUser();
        if($user) {
            $defaultCity = Settings::get('defaultCity');
            $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
            $this->city_id = $globalCity;
        }
    }
}
