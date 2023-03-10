<?php

namespace Pp\Kistochki\Models;

use Model;

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

    protected function calcPercentage($price, $percentage = 20)
    {
        return round($price + $price * ($percentage / 100));
    }

    protected function getPrice($dayPrice)
    {
        $dayPrice = (int) $dayPrice;
        return $dayPrice > 0 ? $this->calcPercentage($dayPrice) : $dayPrice;
    }

    public function beforeSave()
    {
        if($this->master) {
            if(!$this->master_night) {
                $this->master_night = $this->getPrice($this->master);
            }
        } else {
            $this->master = null;
            $this->master_night = null;
        }
        if($this->pro_master) {
            if(!$this->pro_master_night) {
                $this->pro_master_night = $this->getPrice($this->pro_master);
            }
        } else {
            $this->pro_master = null;
            $this->pro_master_night = null;
        }
        if($this->super_master) {
            if(!$this->super_master_night) {
                $this->super_master_night = $this->getPrice($this->super_master);
            }
        } else {
            $this->super_master = null;
            $this->super_master_night = null;
        }
    }
}
