<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Promotion;
use Pp\Kistochki\Classes\Api\Resources\PromotionResource;

class Promotions extends Controller
{
    public $withFields = ['images'];
    public $hideFields = [];
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
        // Search query
        $query = $request->get('query', $request->get('q', $request->get('search')));
        // Search field
        $searchField = $request->get('searchField');
        // Load relations
        $with = array_merge((array) $request->get('with'), $this->withFields);
        logger($with);
        $resource = Promotion::when(count($with), function ($query) use ($with) {
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
        });

        if ($limit) {
            $resource = $resource->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int)$perPage > 0) {
            $resource = $resource->paginate($perPage);
        } else {
            $resource = $resource->get();
        }
//        dump($resource);
        $res = PromotionResource::collection($resource)
            ->only($fields)
            ->hide($hideFields);
//        dump($res);
        return $res;
    }
}
