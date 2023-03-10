<?php

namespace Pp\Kistochki\Models;

use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Saloon extends BaseModel
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
        'district_line' => DistrictLine::class,
        'district_station' => DistrictStation::class,
        'city' => City::class,
    ];

    public $morphToMany = [
        'contacts' => [
            'Pp\Kistochki\Models\Contact',
            'table' => 'pp_kistochki_contactables',
            'name' => 'contactable'
        ]
    ];

    public $attachOne = [
        'logo' => 'System\Models\File'
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    // Load relations globally by default
    protected $with = [
        'city',
        'logo',
        'contacts',
        'district_line',
        'district_station',
    ];
}
