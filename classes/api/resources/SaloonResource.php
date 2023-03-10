<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaloonResource extends JsonResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new SaloonResourceCollection($resource), function ($collection) {
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
            'id' => $this->id,
            'title' => $this->when($this->title, $this->title),
            'subtitle' => $this->when($this->subtitle, $this->subtitle),
            'excerpt' => $this->when($this->excerpt, $this->excerpt),
            'description' => $this->when($this->description, $this->description),
            'address' => $this->when($this->address, $this->address),
            'schedule' => $this->when($this->schedule, $this->schedule),
            'bookable' => (bool) $this->bookable,
            'status' => (bool) $this->status,
            'coords' => $this->when($this->lat && $this->long, [
                'lat' => $this->lat,
                'long' => $this->long,
            ]),
            'logo' => $this->when($this->logo, fn() => $this->logo->getPath()),
            'contacts' => $this->whenLoaded('contacts', fn() => ContactResource::collection($this->contacts)->resolve()),
            'city' => $this->whenLoaded('city', fn() => new CityResource($this->city)),
            // 'district_line' => $this->when(!$this->district_station_id, fn () => new DistrictLineResource($this->district_line)),
            // 'district_station' => $this->when($this->district_station_id, fn () => new DistrictStationResource($this->district_station)),
            'district' => $this->when($this->district_line_id || $this->district_station_id, function () {
                if(!$this->district_station_id) {
                    return new DistrictLineResource($this->district_line);
                }
                return new DistrictStationResource($this->district_station);
            }),
        ]);
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

    protected function filterFields($array)
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
