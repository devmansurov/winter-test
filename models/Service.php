<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    protected $with = ['price', 'seo', 'category', 'images', 'city'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_services';

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
        'description' => 'min:4|max:65535',
        'city' => 'required',
        'category' => 'required',
        'seo.*.meta_title' => [
            'regex:/[а-яА-ЯёЁ\!\?\.\,\;\"\'\*\|\:\+\(\)\=\-\+\\/&%«»#№\w\s]$/iu',
            'between:4,80',
            'max:80',
        ],
    ];

    public function beforeSave()
    {
        if(!$this->pro && $this->price) {
            $this->price->super_master = null;
            $this->price->super_master_night = null;
            $this->price->save();
        }
    }
}
