<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Service;
use Pp\Kistochki\Models\Category;
use Pp\Kistochki\Classes\Api\Resources\ServiceResource;
use Pp\Kistochki\Classes\Api\Resources\CategoryResource;

class Services extends Controller
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
        // Hit field
        $hit = $request->get('hit');
        // Pro field
        $pro = $request->get('pro');
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

        $services = Service::when(count($city), function ($query) use ($city) {
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
            return $q->where('title', 'like', '%' . $query . '%');
        })->when($status !== null, fn($q) => $q->where('status', (bool) $status))
          ->when($pro !== null, fn($q) => $q->where('pro', (bool) $pro))
          ->when($hit !== null, fn($q) => $q->where('hit', (bool) $hit));

        if ($limit) {
            $services = $services->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $services = $services->paginate($perPage);
        } else {
            $services = $services->get();
        }

        return ServiceResource::collection($services)
          ->only($fields)
          ->hide($hideFields);
    }

    public function item(Request $request, $item)
    {
        $with = (array) $request->get('with');

        $service = Service::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new ServiceResource($service);
    }

    public function categories(Request $request)
    {
        $with = (array) $request->get('with');

        $categories = Category::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->get();
            
        return CategoryResource::collection($categories);
    }

    public function category(Request $request, $item)
    {
        $with = (array) $request->get('with');

        $category = Category::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new CategoryResource($category);
    }
}
