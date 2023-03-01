<?php

namespace Pp\Kistochki\Models;

use Model;

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
}
