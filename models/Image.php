<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Image extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_images';
    const SORT_ORDER = 'order';
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'src' => 'System\Models\File',
        'src_mini' => 'System\Models\File'
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
