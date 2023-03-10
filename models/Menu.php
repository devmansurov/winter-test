<?php namespace Pp\Kistochki\Models;

use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class Menu extends BaseModel
{    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'menu_title',
        'status',
        'sort_order',
        'column',
        'excerpt',
        'description',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => self::TITLE_RULE,
        'slug' => self::SLUG_RULE,
        'menu_title' => self::TITLE_RULE,
        'column' => self::COLUMN_RULE,
        'subtitle' => self::SUBTITLE_RULE,
        'excerpt' => self::EXCERPT_RULE,
        'description' => self::DESCRIPTION_RULE,
        'sort_order' => self::SORT_ORDER_RULE,
        'status' => self::STATUS_RULE,
    ];

    /**
     * Relationships
     */
 
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

    // Load relations globally by default
    protected $with = ['seo', 'images'];
} 
