<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Hit;
use Pp\Kistochki\Classes\Api\Resources\HitResource;

class Hits extends Controller
{
    public function all(Request $request)
    {
        // Items per page
        $perPage = (int) $request->get('perPage');
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

        $hits = Hit::when(count($with), function ($query) use ($with) {
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

        if ($limit) {
            $hits = $hits->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $hits = $hits->paginate($perPage);
        } else {
            $hits = $hits->get();
        }

        return HitResource::collection($hits)
          ->only($fields)
          ->hide($hideFields);
    }

    public function item(Request $request, $item)
    {
        // Load relations
        $with = (array) $request->get('with');

        $hit = Hit::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })->where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
            
        return new HitResource($hit);
    }
}
