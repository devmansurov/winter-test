<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Pp\Kistochki\Models\DistrictCategory;

class DistrictResource extends JsonResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = 'user';

    public static function collection($resource)
    {
        return tap(new DistrictResourceCollection($resource), function ($collection) {
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
        $isCategory = $this->resource instanceof DistrictCategory;
        return $this->filterFields([
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->when($this->slug, $this->slug),
            'metro' => $this->when($isCategory, $this->is_metro),
            'districts' => $this->when($isCategory && $this->relationLoaded('districts') && count($this->districts), function () {
                return self::collection($this->districts)->resolve();
            }),
            'attributes' => $this->when($isCategory && $this->cities && count($this->cities), function () {
                return DistrictAttributeResource::collection($this->cities)->resolve();
            }),
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
