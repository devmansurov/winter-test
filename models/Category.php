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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'services' => Service::class
    ];

    public $belongsTo = [
        'seo' => [Seo::class, 'key' => 'seo_id'],
    ];
}
