<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class DistrictCategoryCity extends Model
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
    public $table = 'pp_kistochki_district_category_cities';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'city' => 'Pp\Kistochki\Models\City',
        'district_category' => 'Pp\Kistochki\Models\DistrictCategory',
    ];

    protected $with = ['city'];
}
 