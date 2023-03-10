<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Enums\TagType;
use Pp\Kistochki\Enums\CategoryType;
use Pp\Kistochki\Classes\Helper;

/**
 * Model
 */
class Category extends Model
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
    public $table = 'pp_kistochki_categories';

    public $purgeable = ['type'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphedByMany = [
        'services'  => [
            'Pp\Kistochki\Models\Service',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable'
        ]
    ];

    public $belongsTo = [
        'seo' => [Seo::class, 'key' => 'seo_id'],
    ];

    public function scopeIsService($query)
    {
        return $query->where('status', true)
                     ->where('type', TagType::SERVICE)
                     ->orderBy('title', 'asc');
    }
}
