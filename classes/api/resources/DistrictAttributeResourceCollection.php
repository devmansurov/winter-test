<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DistrictAttributeResourceCollection extends BaseResourceCollection
{
    protected $hiddenFields = [];
    protected $visibleFields = [];
    public function __construct($resource, $class)
    {
        parent::__construct($resource, $class);
    }
}
