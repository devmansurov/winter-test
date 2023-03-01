<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Review extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_reviews';
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
            'scope' => 'isReview'
        ],
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];
}
