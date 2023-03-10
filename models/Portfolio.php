<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Portfolio extends BaseModel
{

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */

    public $timestamps = false;

    protected $slugs = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_portfolios';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'status' => self::STATUS_RULE,
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
