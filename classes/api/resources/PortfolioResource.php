<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;

class PortfolioResource extends BaseResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new PortfolioResourceCollection($resource, PortfolioResource::class), function ($collection) {
            $collection->collects = __CLASS__;
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return $this->filterFields([
            'id' => $this->id,
            'tags' => $this->whenLoaded('tags', function () {
                return new TagCollection($this->tags);
            }),
            'order' => $this->order,
            'images' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            }),
        ], $request);
    }


}
