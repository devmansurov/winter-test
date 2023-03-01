<?php namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Enums\ContactType;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Model
 */
class Contact extends Model
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
    public $table = 'pp_kistochki_contacts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'type' => ContactTypeCast::class,
    // ];

    public $morphedByMany = [
        'saloons'  => [
            'Pp\Kistochki\Models\Saloon',
            'table' => 'pp_kistochki_contactables',
            'name' => 'contactable'
        ]
    ];

    /**
     * Get contact type name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ContactType::from($value)
        );
    }
}
