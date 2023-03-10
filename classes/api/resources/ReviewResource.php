<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;

class ReviewResource extends BaseResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new ReviewResourceCollection($resource), function ($collection) {
            $collection->collects = __CLASS__;
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'name' => $this->name,
            'text' => $this->text,
            'rating' => $this->rating,
            'date' => $this->created_at,
            'tags' => $this->whenLoaded('tags', function () {
                return new TagCollection($this->tags);
            }),
            'avatar' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            }),
            'status' => $this->status,
            'order'=> $this->sort_order,
        ], $request);
    }
}
