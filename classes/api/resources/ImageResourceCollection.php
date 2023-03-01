<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageResourceCollection extends ResourceCollection
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filter($request);
    }

    public function hide(array $fields)
    {
        $this->hiddenFields = $fields;
        return $this;
    }

    public function only(array $fields)
    {
        $this->visibleFields = $fields;
        return $this;
    }

    protected function filter($request)
    {
        if (count($this->hiddenFields)) {
            return $this->collection->map(function (ImageResource $resource) use ($request) {
                return $resource->hide($this->hiddenFields)->toArray($request);
            })->all();
        } elseif (count($this->visibleFields)) {
            return $this->collection->map(function (ImageResource $resource) use ($request) {
                return $resource->only($this->visibleFields)->toArray($request);
            })->all();
        } else {
            return $this->collection;
        }
    }
}
