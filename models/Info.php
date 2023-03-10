<?php namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Models\News;

/**
 * Model
 */
class Info extends News
{
    public $table = 'pp_kistochki_info';
    // city switch disabled
    protected static function booted(){}
    public function beforeSave(){}
}
