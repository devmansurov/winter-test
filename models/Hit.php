<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Hit extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_hits';

    public $morphedByMany = [
        'services' => [
            'Pp\Kistochki\Models\Service', 
            'table' => 'pp_kistochki_hitables', 
            'name' => 'hitable'
        ],
        'promotions' => [
            'Pp\Kistochki\Models\Post', 
            'table' => 'pp_kistochki_hitables', 
            'name' => 'hitable',
            'scope' => 'isPromotion'
        ],
    ];

    public $belongsTo = [
        'city' => [
            'Pp\Kistochki\Models\City',
        ],
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
