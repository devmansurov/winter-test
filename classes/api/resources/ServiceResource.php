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
            'description' => $this->description,
            'slug' => $this->slug,
            // 'order' => $this->order,
            'price' => $this->when($this->relationLoaded('price') && $hasPrice, function () {
                return new PriceResource($this->price);
            }),
            'seo' => $this->whenLoaded('seo', function () {
                return new SeoResource($this->seo);
            }),
            'city' => $this->whenLoaded('city', function () {
                return new CityResource($this->city);
            }),
            'tags' => $this->whenLoaded('tags', function () {
                return new TagCollection($this->tags);
            }),
            'images' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            })
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
