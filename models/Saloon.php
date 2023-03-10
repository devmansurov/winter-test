<?php

namespace Pp\Kistochki\Models;

use Model;
use Backend\Widgets\Filter;
use Pp\Kistochki\Classes\Helper;
use Pp\Kistochki\Controllers\Saloons;
use Winter\Storm\Database\Builder;

/**
 * Model
 */
class Saloon extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_saloons';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
 
    public $belongsTo = [
        'district' => [
            'Pp\Kistochki\Models\District',
            // 'key' => 'district_id',
            // 'otherKey' => 'id'
        ],
        'city' => [
            'Pp\Kistochki\Models\City',
            // 'key' => 'district_id',
            // 'otherKey' => 'id'
        ],
    ];

    public $morphToMany = [
        'contacts' => [
            'Pp\Kistochki\Models\Contact',
            'table' => 'pp_kistochki_contactables',
            'name' => 'contactable'
        ]
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        $user = \BackendAuth::getUser();
        if($user) {
            $defaultCity = Settings::get('defaultCity');
            $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
            Saloon::addGlobalScope('globalCityFilter', function (Builder $builder) use($globalCity) {
                $builder->where('city_id', $globalCity);
            });
        }

        // Saloons::extendListFilterScopes(function(Filter $filter) use ($user)
        // {
        //     $scopes = $filter->getScopes();
        //     $localCity = $scopes['cities']->value;
        //     if($localCity) {
        //         Saloon::addGlobalScope('localCityFilter', function (Builder $builder) use($localCity) {
        //             $builder->withoutGlobalScopes()->where('city_id', array_keys($localCity)[0]);
        //         });
        //     }
        // });
    }
}
