<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class DistrictCategory extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Sortable',
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_district_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = ['details'];

    // public $hasMany = [
    //     'saloons' => 'Pp\Kistochki\Models\Saloon',
    //     'key' => 'district_id',
    //     'otherKey' => 'id'
    // ];

    public $belongsTo = [
        'city' => 'Pp\Kistochki\Models\City',
    ];

    public $hasMany = [
        'districts' => District::class,
        'cities' => [
            'Pp\Kistochki\Models\DistrictCategoryCity',
        ]
    ];

    // public $hasMany = [
    //     'cities' => [
    //         'Pp\Kistochki\Models\DistrictCategoryCity',
    //         // 'table'    => 'pp_kistochki_district_category_cities',
    //     ]
    // ];

    // Load relations globally by default
    protected $with = ['districts', 'cities'];
    
}
