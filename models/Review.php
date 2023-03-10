<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Review extends BaseModel
{

    public $timestamps = false;
    protected $slugs=[];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_reviews';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => self::HTML_TITLE_RULE,
        'name' => self::HTML_TITLE_RULE,
        'text' => self::DESCRIPTION_RULE,
        'status' => self::STATUS_RULE,
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
