<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;

class DistrictLineResource extends BaseResource
{

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new DistrictLineResourceCollection($resource, DistrictLineResource::class), function ($collection) {
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
            'color' => $this->when($this->color, $this->color),
            'is_district' => $this->is_district,
            'city' => $this->whenLoaded('city', function () {
                return new CityResource($this->city);
            }),
            'stations' => $this->when($this->relationLoaded('district_stations') && count($this->district_stations), function () {
                return DistrictStationResource::collection($this->district_stations)->resolve();
            }),
        ], $request);
    }
}
