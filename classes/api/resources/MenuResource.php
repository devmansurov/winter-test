<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;

class MenuResource extends BaseResource
{

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new MenuResourceCollection($resource, MenuResource::class), function ($collection) {
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
            'menu_title' => $this->when($this->menu_title, $this->menu_title),
            'slug' => $this->slug,
            'description' => $this->when($this->description, $this->description),
            'images' => $this->when($this->relationLoaded('images') && count($this->images), function () {
                return new ImageCollection($this->images);
            }),
            'seo' => $this->when($this->relationLoaded('seo') && ($this->seo->meta_title || $this->seo->meta_desc), function () {
                return new SeoResource($this->seo);
            })
        ], $request);
    }

}
