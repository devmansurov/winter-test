<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Saloon;
use Pp\Kistochki\Classes\Api\Resources\SaloonResource;

class Saloons extends Controller
{
    public function all(Request $request)
    {
        // City ID
        $city = (array) $request->get('city');
        // Items per page
        $perPage = (int) $request->get('perPage');
        // Get limited items
        $limit = (int) $request->get('limit');
        // Order field
        $order = (array) $request->get('order');
        // Status field
        $status = $request->get('status');
        // Status field
        $bookable = $request->get('bookable');
        // District id's
        $districts = (array) $request->get('district');
        // District station id's
        $stations = (array) $request->get('station');
        // Hide districts with specified id's
        $hideIds = (array) $request->get('hideIds');
        // Get fields only
        $fields = (array) $request->get('fields');
        // Hide fields
        $hideFields = (array) $request->get('hideFields');
        // Hide empty fields
        $hideEmptyFields = (bool) $request->get('hideEmpty', false);
        // Search query
        $query = $request->get('query', $request->get('q', $request->get('search')));
        // Search field
        $searchField = $request->get('searchField');
        // Load relations
        $with = (array) $request->get('with');

        $saloons = Saloon::when(count($city), function ($query) use ($city) {
            return $query->whereIn('city_id', $city);
        })->when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->when(count($hideIds), function ($query) use ($hideIds) {
            return $query->whereNotIn('id', $hideIds);
        })->when(count($districts), function ($query) use ($districts) {
            return $query->whereIn('district_line_id', $districts);
        })->when(count($stations), function ($query) use ($stations) {
            return $query->whereIn('district_station_id', $stations);
        })->when(count($order), function ($query) use ($order) {
            if (isset($order['field'])) {
                $field = $order['field'];
                $type = $order['type'] ?? 'ASC';
                return $query->orderBy($field, $type);
            }
        })->when($query && mb_strlen(trim($query)) > 0, function ($q) use ($query, $searchField) {
            return $q->where('title', 'like', '%' . $query . '%');
        })->when($status !== null, fn($q) => $q->where('status', (bool) $status))
          ->when($bookable !== null, fn($q) => $q->where('bookable', (bool) $bookable));

        if ($limit) {
            $saloons = $saloons->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $saloons = $saloons->paginate($perPage);
        } else {
            $saloons = $saloons->get();
        }

        return SaloonResource::collection($saloons)
          ->only($fields)
          ->hide($hideFields);
    }

    public function item(Request $request, $item)
    {
        $with = (array) $request->get('with');

        $saloon = Saloon::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new SaloonResource($saloon);
    }
}
