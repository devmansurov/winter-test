<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\District;
use Pp\Kistochki\Models\DistrictCategory;
use Pp\Kistochki\Classes\Api\Resources\DistrictResource;
use Pp\Kistochki\Classes\Api\Resources\DistrictLineResource;
use Pp\Kistochki\Classes\Api\Resources\DistrictStationResource;
use Pp\Kistochki\Models\DistrictLine;
use Pp\Kistochki\Models\DistrictStation;

class Districts extends Controller
{
    /**
     * Get all districts.
     *
     * Return all districts list.
     */
    public function all(Request $request)
    {
        // Items per page
        $take = (int) $request->get('take');
        // Get limited items
        $limit = (int) $request->get('limit');
        // Order field
        $order = (array) $request->get('order');
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
        $searchField = $request->get('searchField', 'title');
        // Load relations
        $with = (array) $request->get('with');

        $districts = District::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->when(count($hideIds), function ($query) use ($hideIds) {
            return $query->whereNotIn('id', $hideIds);
        })->when(count($order), function ($query) use ($order) {
            if (isset($order['field'])) {
                $field = $order['field'];
                $type = $order['type'] ?? 'ASC';
                return $query->orderBy($field, $type);
            }
        })->when($query && mb_strlen(trim($query)) > 0, function ($q) use ($query, $searchField) {
            return $q->where($searchField, 'like', '%' . $query . '%');
        });

        if ($take) {
            $districts = $districts->limit($take)->get();
        } elseif (is_numeric($limit) && (int) $limit > 0) {
            $districts = $districts->paginate($limit);
        } else {
            $districts = $districts->get();
        }

        return DistrictResource::collection($districts)
          ->only($fields)
          ->hide($hideFields);
    }

    /**
     * Get all district categories.
     *
     * Return all district categories list.
     */
    public function categories(Request $request)
    {
        // City ID
        $city = (array) $request->get('city');
        // Items per page
        $take = (int) $request->get('take');
        // Get limited items
        $limit = (int) $request->get('limit');
        // Order field
        $order = (array) $request->get('order');
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
        $searchField = $request->get('searchField', 'title');
        // Load relations
        $with = (array) $request->get('with');

        $districts = DistrictCategory::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->when(count($hideIds), function ($query) use ($hideIds) {
            return $query->whereNotIn('id', $hideIds);
        })->when(count($order), function ($query) use ($order) {
            if (isset($order['field'])) {
                $field = $order['field'];
                $type = $order['type'] ?? 'ASC';
                return $query->orderBy($field, $type);
            }
        })->when($query && mb_strlen(trim($query)) > 0, function ($q) use ($query, $searchField) {
            return $q->where($searchField, 'like', '%' . $query . '%');
        })->when($city, function ($query) use ($city) {
            return $query->whereHas('cities', function ($q) use ($city) {
                $q->whereIn('city_id', $city);
            });
        });

        if ($take) {
            $districts = $districts->limit($take)->get();
        } elseif (is_numeric($limit) && (int) $limit > 0) {
            $districts = $districts->paginate($limit);
        } else {
            $districts = $districts->get();
        }

        return DistrictResource::collection($districts)
          ->only($fields)
          ->hide($hideFields);
    }

    public function lines(Request $request)
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
        $searchField = $request->get('searchField', 'title');
        // Load relations
        $with = (array) $request->get('with', ['district_stations']);

        $districtLines = DistrictLine::when(count($city), function ($query) use ($city) {
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
        })->when($query && mb_strlen(trim($query)) > 0, function ($q) use ($query, $searchField) {
            return $q->where($searchField, 'like', '%' . $query . '%');
        })->when($status !== null, fn($q) => $q->where('status', (bool) $status));

        if ($limit) {
            $districtLines = $districtLines->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $districtLines = $districtLines->paginate($perPage);
        } else {
            $districtLines = $districtLines->get();
        }

        return DistrictLineResource::collection($districtLines)
          ->only($fields)
          ->hide($hideFields);
    }

    public function stations(Request $request)
    {
        // City ID
        $city = (array) $request->get('city');
        // Items per page
        $perPage = (int) $request->get('perPage');
        // Get limited items
        $limit = (int) $request->get('limit');
        // Order field
        $order = (array) $request->get('order');
        // District lines field
        $districtLines = (array) $request->get('district');
        // Status field
        $status = $request->get('status');
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
        $searchField = $request->get('searchField', 'title');
        // Load relations
        $with = (array) $request->get('with', ['district_line']);

        $districtStations = DistrictStation::when(count($city), function ($query) use ($city) {
            return $query->whereHas('district_line', function ($q) use ($city) {
                $q->whereIn('city_id', $city);
            });
        })->when(count($districtLines), function ($query) use ($districtLines) {
            return $query->whereIn('district_line_id', $districtLines);
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
        })->when($query && mb_strlen(trim($query)) > 0, function ($q) use ($query, $searchField) {
            return $q->where($searchField, 'like', '%' . $query . '%');
        })->when($status !== null, fn($q) => $q->where('status', (bool) $status));

        if ($limit) {
            $districtStations = $districtStations->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $districtStations = $districtStations->paginate($perPage);
        } else {
            $districtStations = $districtStations->get();
        }

        return DistrictStationResource::collection($districtStations)
          ->only($fields)
          ->hide($hideFields);
    }

    public function line(Request $request, $item)
    {
        $with = (array) $request->get('with');

        $line = DistrictLine::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
          ->orWhere('slug', $item)
          ->firstOrFail();
            
        return new DistrictLineResource($line);
    }

    public function station(Request $request, $item)
    {
        $with = (array) $request->get('with');
        
        $line = DistrictStation::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
          ->orWhere('slug', $item)
          ->firstOrFail();
            
        return new DistrictStationResource($line);
    }

    public function lineStations(Request $request, $item)
    {
        $stations = DistrictStation::where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new DistrictStationResource($stations);
    }
}
