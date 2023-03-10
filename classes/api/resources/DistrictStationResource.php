<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;
use Pp\Kistochki\Models\District;

class DistrictStationResource extends BaseResource
{

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new DistrictStationResourceCollection($resource, DistrictStationResource::class), function ($collection) {
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
            'coords' => $this->when($this->lat && $this->long, [
                'lat' => $this->lat,
                'long' => $this->long,
            ]),
            'line' => $this->whenLoaded('district_line', function () {
                return new DistrictLineResource($this->district_line);
            })
        ], $request);
    }
}
