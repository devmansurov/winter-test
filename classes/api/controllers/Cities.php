<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\City;
use Pp\Kistochki\Classes\Api\Resources\CityResource;

class Cities extends Controller
{
    public function all(Request $request)
    {
        // Items per page
        $perPage = (int)$request->get('perPage');
        // Get limited items
        $limit = (int)$request->get('limit');
        // Order field
        $order = (array)$request->get('order');
        // Hide districts with specified id's
        $hideIds = (array)$request->get('hideIds');
        // Get fields only
        $fields = (array)$request->get('fields');
        // Hide fields
        $hideFields = (array)$request->get('hideFields');
        // Hide empty fields
        $hideEmptyFields = (bool)$request->get('hideEmpty', false);
        // Load relations
        $with = (array)$request->get('with');

        $cities = City::when(count($with), function ($query) use ($with) {
            return $query->with([ 'tags']);
        })
            ->when(count($hideIds), function ($query) use ($hideIds) {
            return $query->whereNotIn('id', $hideIds);
        })->when(count($order), function ($query) use ($order) {
            if (isset($order['field'])) {
                $field = $order['field'];
                $type = $order['type'] ?? 'ASC';
                return $query->orderBy($field, $type);
            }
        });

        if ($limit) {
            $cities = $cities->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int)$perPage > 0) {
            $cities = $cities->paginate($perPage);
        } else {
            $cities = $cities->get();
        }

        return CityResource::collection($cities)
            ->only($fields)
            ->hide($hideFields);
    }
}
