<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Job extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\Sortable;

    public $implement = [
        'Winter.Storm.Database.Behaviors.Sortable',
        'Winter.Storm.Database.Behaviors.Purgeable'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_jobs';

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
        'slug' => [
            'required',
            // 'between:4,80',
            // 'max:80',
            'regex:/^[\.a-z0-9_-]+$/su',
        ],
        'description' => 'required|min:4|max:65535',
        'city' => 'required',
    ]; 

    public $belongsTo = [
        'seo' => [Seo::class, 'key' => 'seo_id'],
        'city' => City::class,
    ];
} 
