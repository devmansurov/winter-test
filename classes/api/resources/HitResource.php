<?php

namespace Pp\Kistochki\Classes\Api\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HitResource extends JsonResource
{
    protected $hiddenFields = [];
    protected $visibleFields = [];

    public static $wrap = null;

    public static function collection($resource)
    {
        return tap(new HitResourceCollection($resource), function ($collection) {
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
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            // 'date' => [
            //     'created' => $this->created_at,
            //     'updated' => $this->updated_at,
            // ],
            'images' => $this->whenLoaded('images', function () {
                return new ImageCollection($this->images);
            }),
            'services' => $this->whenLoaded('services', function () {
                return new ServiceCollection($this->services);
            })
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
