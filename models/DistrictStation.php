<?php namespace Pp\Kistochki\Models;

use Pp\Kistochki\Classes\BaseModel;

/**
 * Model
 */
class DistrictStation extends BaseModel
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
    public $table = 'pp_kistochki_district_stations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'district_line' => [
            'Pp\Kistochki\Models\DistrictLine'
        ],
    ];

    public function addCityFilter($query, $city)
    {
        if($city) {
            $query->whereHas('district_line', function ($q) use ($city) {
                $q->where('city_id', $city);
            });
        }
    }

    public function scopeFilterStation($query, $parent)
    {
        if($parent->district_line_id) {
            return $query->where('district_line_id', $parent->district_line_id);
        }
    }

    // Load relations globally by default
    // protected $with = [
    //     'district_line'
    // ];

    public function getDistrictStationOptions($scopes = null)
    {
        if (!empty($scopes['district_line']->value)) {
            return DistrictStation::whereIn('district_line_id', array_keys($scopes['district_line']->value))->orderBy('title')->lists('title', 'id');
        } else {
            return DistrictStation::orderBy('title')->lists('title', 'id');
        }
    }
}
