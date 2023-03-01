<?php

namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class District extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_districts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'saloons' => 'Pp\Kistochki\Models\Saloon',
        'key' => 'district_id',
        'otherKey' => 'id'
    ];

    public $belongsTo = [
        'districtCity' => 'Pp\Kistochki\Models\City'
    ];
}
