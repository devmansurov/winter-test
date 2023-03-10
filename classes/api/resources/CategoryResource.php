<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Pp\Kistochki\Models\DistrictCategory;

<<<<<<< HEAD:classes/api/resources/CategoryResource.php
class CategoryResource extends JsonResource
=======
class DistrictAttributeResource extends JsonResource
>>>>>>> maxat:classes/api/resources/DistrictAttributeResource.php
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = '';

    public static function collection($resource)
    {
<<<<<<< HEAD:classes/api/resources/CategoryResource.php
        return tap(new CategoryResourceCollection($resource, CategoryResource::class), function ($collection) {
=======
        return tap(new DistrictAttributeResourceCollection($resource, DistrictAttributeResource::class), function ($collection) {
>>>>>>> maxat:classes/api/resources/DistrictAttributeResource.php
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
<<<<<<< HEAD:classes/api/resources/CategoryResource.php
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'services' => $this->when($this->relationLoaded('services') && count($this->services), function () {
                return ServiceResource::collection($this->services)->resolve();
            }),
=======
            'city' => $this->whenLoaded('city', new CityResource($this->city)),
            'color' => $this->when($this->color, $this->color),
>>>>>>> maxat:classes/api/resources/DistrictAttributeResource.php
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
