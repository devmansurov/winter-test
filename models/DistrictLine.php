<?php namespace Pp\Kistochki\Models;

use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class DistrictLine extends BaseModel
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
    public $table = 'pp_kistochki_district_lines';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'district_stations' => DistrictStation::class
    ];

    public $belongsTo = [
        'city' => 'Pp\Kistochki\Models\City',
    ];

    public function getDistrictLineOptions()
    {
        return DistrictLine::orderBy('title')->lists('title', 'id');
    }
}
