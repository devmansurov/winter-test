<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Portfolio;
use Pp\Kistochki\Classes\Api\Resources\PromotionResource;
use Pp\Kistochki\Models\News;
use Pp\Kistochki\Classes\Api\Resources\NewsResource;
use Illuminate\Support\Facades\DB;
class Newses extends Controller
{
    public $withFields = ['images'];
    public $hideFields = ['tags', 'seo'];

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
        // Hide fields
        $hideFields = (array)$request->get('hideFields');

        // Get fields only
        $fields = (array)$request->get('fields');
        // Search query
        $query = $request->get('query', $request->get('q', $request->get('search')));
        // Search field
        $searchField = $request->get('searchField', 'title');
        // Load relations
        $with = array_merge((array) $request->get('with'), $this->withFields);
        $hideFields = array_merge($hideFields,$this->hideFields);
        $resource = News::when(count($with), function ($query) use ($with) {
            return $query->with($with);
        })
            ->when(count($hideIds), function ($query) use ($hideIds) {
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
        $res = NewsResource::collection($resource)
            ->only($fields)
            ->hide($hideFields);
//        dump($res);
        return $res;
    }

    public function item(Request $request, $item)
    { // Get fields only
        \DB::enableQueryLog();
        $fields = (array)$request->get('fields');
        // Hide fields
        $hideFields = (array)$request->get('hideFields');
        $with = (array)$request->get('with');
        $with = array_merge($with, $this->with_fields);
        $resource = News::where('status', false)->where('slug', $item)
            ->when(count($with), function ($query) use ($with) {
                return $query->with($with);
            })->first()->get();
//            ->onlyActive()
//            ->onlyPublished()
//            ->only($fields)
//            ->hide($hideFields)
//        dump($resource);
//        $res = new NewsResource($resource);
//        dd(\DB::getQueryLog());
        return $resource;
    }


}
