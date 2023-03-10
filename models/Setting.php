<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'pp_kistochki_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    // Optional - sets the TTL for the settings cache
    public $settingsCacheTtl = 3600;

    public function initSettingsData()
    {
        $city = City::first();
        $this->defaultCity = $city ? $city->id : 0;
        $this->callback_status = 1;
    }
}
