<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Hit extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    protected $dates = ['deleted_at'];
    protected $with = ['price'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_hits';

    public $morphOne = [
        'price' => [
            'Pp\Kistochki\Models\Price',
            'name' => 'priceable'
        ],
        'categories' => [
            'Pp\Kistochki\Models\Category',
            'name' => 'categorizable',
            'scope' => 'isHit'
        ],
    ];

    public $morphToMany = [
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    public $belongsTo = [
        'city' => City::class,
        'category' => Category::class,
        'seo' => [Seo::class, 'key' => 'seo_id'],
    ];

    public $hasOne = [
        'price' => [
            \Pp\Kistochki\Models\Price::class,
            'key' => 'id'
        ],
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => [
            'required',
            'regex:/[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#№\w\s]$/iu',
            'between:4,191',
            'max:191',
        ],
        'subtitle' => [
            'required',
            'regex:/[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#№\w\s]$/iu',
            'between:4,191',
            'max:191',
        ],
        'slug' => [
            'required',
            // 'between:4,80',
            // 'max:80',
            'regex:/^[\.a-z0-9_-]+$/su',
        ],
        // 'weight' => 'required|integer|between:1,100',
        'description' => 'min:4|max:65535',
        'city' => 'required',
        'category' => 'required',
        'seo.*.meta_title' => [
            'regex:/[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#№\w\s]$/iu',
            'between:4,80',
            'max:80',
        ],
        // 'meta_desc' => [
        //     'regex:/[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#№\w\s]$/iu',
        //     'between:4,191',
        //     'max:191',
        // ],
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    protected $fillable = [
        'title',
        'subtitle',
        'excerpt',
        'description',
        'slug',
        'sort_order',
        'pro',
        'hit',
        'status',
        'price_id',
        'city_id',
        'category_id',
        'seo_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array List of attributes to purge.
     */
    public $purgeable = ['edit_price'];

    public function beforeSave()
    {
        // if(!$this->pro) {
        //     $this->price->super_master = 0;
        //     $this->price->super_master_night = 0;
        //     $this->price->save();
        // }
    }
}
