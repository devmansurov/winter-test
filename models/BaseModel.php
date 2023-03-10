<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class BaseModel extends Model
{
    /**
     * @var array Validation rules
     */
    public $rules = Helper::getValidationRules(self::class);
} 
