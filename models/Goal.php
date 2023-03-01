<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Goal extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_goals';

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

    public $jsonable = ['information'];

    public $belongsTo = [
        'city' => City::class,
    ];
}
