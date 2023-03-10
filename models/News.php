<?php namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class News extends BaseModel
{

    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_news';

//    public $hasOne = [
//        'seo' => [
//            \Pp\Kistochki\Models\Seo::class,
//            'key' => 'id'
//        ]
//    ];
    public $belongsTo = [
        'seo' => [Seo::class, 'key' => 'seo_id'],
    ];
    public $morphToMany = [
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => self::HTML_TITLE_RULE,
        'slug' => ["unique:pp_kistochki_goals,slug", ...self::SLUG_RULE],
        'text_short' => self::SUBTITLE_RULE,
        'text' => self::DESCRIPTION_RULE,
        'status' => self::STATUS_RULE,
    ];
    protected $hidden = ['status', 'deleted_at'];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
