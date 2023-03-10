<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Slider extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Sortable',
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_sliders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphToMany = [
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    public $belongsTo = [
        'promotion' => Promotion::class,
        'city' => City::class,
    ];

    // public $hasMany = [
    //     'promotions' => [
    //         'Pp\Kistochki\Models\Post',
    //         'scope' => 'isPromotion'
    //     ]
    // ];

    // public $hasOne = [
    //     'promotion' => [
    //         'Pp\Kistochki\Models\Post',
    //         'scope' => 'isPromotion',
    //         'key' => 'promotion_id', 
    //         'otherKey' => 'id'
    //     ]
    // ];
}
