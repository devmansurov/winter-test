<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;
use Pp\Kistochki\Models\Promotion;

class PromotionResource extends BaseResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new PromotionResourceCollection($resource, PromotionResource::class), function ($collection) {
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
            'title' => $this->title,
            'sub_title' => $this->title,
            'slug' => $this->slug,
            'text' => $this->text,
            'order' => $this->sort_order,
            'images' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            }),
            'seo' => $this->whenLoaded('seo', function () {
                return new SeoResource($this->seo);
            }),
            'status'=>$this->status
        ], $request);
    }
}
