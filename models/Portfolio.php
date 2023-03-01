<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Portfolio extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_portfolios';
    const SORT_ORDER = 'order';
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
            'scope' => 'isPortfolio'
        ],
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];
}
