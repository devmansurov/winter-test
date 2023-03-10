<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Menu;
use Pp\Kistochki\Classes\Api\Resources\MenuResource;

class Menus extends Controller
{
    public function all(Request $request)
    {
        // City ID
        $city = (array) $request->get('city');
        // Order field
        $order = (array)$request->get('order');
        // Hide districts with specified id's
        $hideIds = (array)$request->get('hideIds');
        // Hide fields
        $hideFields = (array)$request->get('hideFields');
        // Get fields only
        $fields = (array)$request->get('fields');
        // Hide empty fields
        $hideEmptyFields = (bool) $request->get('hideEmpty', false);
        // Load relations
        $with = (array) $request->get('with');

        $menus = Menu::when(count($city), function ($query) use ($city) {
            return $query->whereIn('city_id', $city);
        })->when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->when(count($hideIds), function ($query) use ($hideIds) {
            return $query->whereNotIn('id', $hideIds);
        })->when(count($order), function ($query) use ($order) {
            if (isset($order['field'])) {
                $field = $order['field'];
                $type = $order['type'] ?? 'ASC';
                return $query->orderBy($field, $type);
            }
        })->get();

        return MenuResource::collection($menus)
          ->only($fields)
          ->hide($hideFields);
    }

    public function item(Request $request, $item)
    {
        // Load relations
        $with = (array) $request->get('with');

        $menu = Menu::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new MenuResource($menu);
    }
}
