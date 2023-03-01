<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;
use Pp\Kistochki\Models\News;

class NewsResource extends BaseResource
{

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new NewsResourceCollection($resource, NewsResource::class), function ($collection) {
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
            'slug' => $this->slug,
            'order' => $this->order,
            'images' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            }),
            'text_short' => $this->text_short,
            'text' => $this->text,
            'seo' => $this->whenLoaded('seo', function () {
                return new SeoResource($this->seo);
            }),
            'date' =>$this->updated_at,

        ], $request);
    }

}
