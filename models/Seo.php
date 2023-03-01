<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Seo extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_seos';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $timestamps = false;
}
