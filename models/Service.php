<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_services';

    public $morphOne = [
        'price' => [
            'Pp\Kistochki\Models\Price',
            'name' => 'priceable'
        ]
    ];

    public $morphToMany = [
        'categories' => [
            'Pp\Kistochki\Models\Category',
            'table' => 'pp_kistochki_categorizables',
            'name' => 'categorizable',
            'scope' => 'isService'
        ],
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    public $belongsTo = [
        'city' => [
            'Pp\Kistochki\Models\City',
        ],
        // 'price' => [
        //     'Pp\Kistochki\Models\Price',
        // ],
    ];

    // public $hasOne = [
    //     'price' => [
    //         'Pp\Kistochki\Models\Price',
    //         'key' => 'id', 
    //         'otherKey' => 'price_id'
    //     ]
    // ];

    public $hasOne = [
        'price' => [
            \Pp\Kistochki\Models\Price::class,
            'key' => 'id'
        ],
        'seo' => [
            \Pp\Kistochki\Models\Seo::class,
            'key' => 'id'
        ]
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
