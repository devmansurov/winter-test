<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Callback extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_callbacks';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $guarded = [];
}
