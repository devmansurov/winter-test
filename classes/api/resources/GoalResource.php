<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Pp\Kistochki\Classes\Api\Resources\BaseResource;

class GoalResource extends BaseResource
{

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new GoalResourceCollection($resource, GoalResource::class), function ($collection) {
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
            'description' => $this->when($this->description, $this->description),
            'information' => $this->when($this->information && count($this->information), $this->information),
            'images' => $this->when($this->relationLoaded('images') && count($this->images), function () {
                return new ImageCollection($this->images);
            }),
            'city' => $this->whenLoaded('city', function () {
                return new CityResource($this->city);
            })
        ], $request);
    }

}
