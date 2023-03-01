<?php

namespace Pp\Kistochki\Models;

use Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Model
 */
class Price extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_prices';

    /**
     * @var array Validation rules
     */
    public $rules = [
        // 'master' => [
        //     'required'
        // ]
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    protected function setMasterAttribute($value)
    {
        $this->attributes['master'] = $value;
        $this->attributes['master_night'] = $this->getPrice($value);
    }

    protected function setProMasterAttribute($value)
    {
        $this->attributes['pro_master'] = $value;
        $this->attributes['pro_master_night'] = $this->getPrice($value);
    }

    protected function setSuperMasterAttribute($value)
    {
        $this->attributes['super_master'] = $value;
        $this->attributes['super_master_night'] = $this->getPrice($value);
    }

    protected function calcPercentage($price, $percentage = 20)
    {
        return round($price + $price * ($percentage / 100));
    }

    protected function getPrice($dayPrice)
    {
        return $dayPrice > 0 ? $this->calcPercentage($dayPrice) : $dayPrice;
    }
}
