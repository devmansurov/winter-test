<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Pp\Kistochki\Models\Saloon;

class ServiceResource extends JsonResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new ServiceResourceCollection($resource), function ($collection) {
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
        $hasPrice = $this->price->master && $this->price->master_night || $this->price->pro_master && $this->price->pro_master_night || $this->price->super_master && $this->price->super_master_night;
        
        return $this->filterFields([
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->when($this->subtitle, $this->subtitle),
            'slug' => $this->when($this->slug, $this->slug),
            'excerpt' => $this->when($this->excerpt, $this->excerpt),
            'description' => $this->when($this->description, $this->description),
            'price' => $this->when($this->relationLoaded('price') && $hasPrice, function () {
                return new PriceResource($this->price);
            }),
            'category' => $this->whenLoaded('category', function () {
                return new CategoryResource($this->category);
            }),
            'tags' => $this->whenLoaded('tags', function () {
                return new TagCollection($this->tags);
            }),
            'city' => $this->whenLoaded('city', function () {
                return new CityResource($this->city);
            }),
            'images' => $this->when($this->relationLoaded('images') && count($this->images), function () {
                return new ImageCollection($this->images);
            }),
            'seo' => $this->when($this->relationLoaded('seo') && ($this->seo->meta_title || $this->seo->meta_desc), function () {
                return new SeoResource($this->seo);
            }),
            'pro' => (bool) $this->pro,
            'hit' => (bool) $this->hit,
            'status' => (bool) $this->status,
        ], $request);
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

    protected function filterFields($array, $request)
    {
        if (request()->get('hideEmpty')) {
            $array = collect($array)->filter(function ($value, $key) {
                return $value != null || $value != '';
            });
        }
        if (count($this->visibleFields)) {
            return collect($array)->only($this->visibleFields)->toArray();
        } elseif (count($this->hiddenFields)) {
            return collect($array)->forget($this->hiddenFields)->toArray();
        }

        return $array;
    }
}
