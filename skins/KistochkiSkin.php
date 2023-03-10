<?php namespace Pp\Kistochki\Skins;

use Backend\Skins\Standard as BackendSkin;

/**
 * Modified backend skin information file.
 *
 * This is modified to include an additional path to override the default layouts.
 *
 */

class KistochkiSkin extends BackendSkin
{
    /**
     * {@inheritDoc}
     */
    public function getLayoutPaths()
    {
        return [
            plugins_path('/pp/kistochki/skins/layouts'),
            $this->skinPath . '/layouts'
        ];
    }
}