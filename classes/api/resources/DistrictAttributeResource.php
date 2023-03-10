<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Pp\Kistochki\Models\DistrictCategory;

class DistrictAttributeResource extends JsonResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = '';

    public static function collection($resource)
    {
        return tap(new DistrictAttributeResourceCollection($resource, DistrictAttributeResource::class), function ($collection) {
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
            'city' => $this->whenLoaded('city', new CityResource($this->city)),
            'color' => $this->when($this->color, $this->color),
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
