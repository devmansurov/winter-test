<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;
    use \Winter\Storm\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_news';
    const SORT_ORDER = 'order';

    public $hasOne = [
        'seo' => [
            \Pp\Kistochki\Models\Seo::class,
            'key' => 'id'
        ]
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
    ];
    protected $hidden = ['status', 'deleted_at'];
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
