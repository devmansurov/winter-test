<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Promotion extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;
    use \Winter\Storm\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];



    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_promotions';
    const SORT_ORDER = 'order';
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    public  $morphToMany = [
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];
}
