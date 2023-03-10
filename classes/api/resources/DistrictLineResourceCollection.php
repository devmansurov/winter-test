<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResourceCollection;

class DistrictLineResourceCollection extends BaseResourceCollection
{
    protected $hiddenFields = [];
    protected $visibleFields = [];
    public function __construct($resource, $class)
    {
        parent::__construct($resource, $class);
    }
}
