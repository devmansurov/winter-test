<?php
 
namespace Pp\Kistochki\Classes\Api\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'title' => $this->title,
          'metro' => $this->is_metro
        ];
    }
}