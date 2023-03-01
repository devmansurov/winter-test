<?php namespace Pp\Kistochki\Models;

use Model;

/**
 * Model
 */
class Callback extends Model
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
        $this->callback_status = 1;
    }
}
