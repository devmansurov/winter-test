<?php namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Promotion extends BaseModel
{

//    public $timestamps = false;

    public $belongsTo = [
        'seo' => [Seo::class, 'key' => 'seo_id'],
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_promotions';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => self::HTML_TITLE_RULE,
        'slug' => ["unique:pp_kistochki_goals,slug", ...self::SLUG_RULE],
        'sub_title' => self::SUBTITLE_RULE,
        'text' => self::DESCRIPTION_RULE,
        'status' => self::STATUS_RULE,
    ];

    public  $morphToMany = [
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];
}
