<?php namespace Pp\Kistochki\Models;

use Str;
use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Goal extends BaseModel
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_goals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'status',
        'sort_order',
        'excerpt',
        'description',
        'information',
        'city_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => self::HTML_TITLE_RULE,
        // 'slug' => ["unique:pp_kistochki_goals,slug", ...self::SLUG_RULE],
        // 'subtitle' => self::SUBTITLE_RULE,
        'excerpt' => self::EXCERPT_RULE,
        'description' => self::DESCRIPTION_RULE,
        'information' => self::INFORMATION_RULE,
        'information.*.title' => self::HTML_TITLE_RULE,
        'information.*.description' => self::HTML_TITLE_RULE,
        'status' => self::STATUS_RULE,
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

    // Load relations globally by default
    protected $with = ['images', 'city'];
}
