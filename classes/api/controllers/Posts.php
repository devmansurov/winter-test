<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Http\Request;
use Pp\Kistochki\Models\Post;
use Pp\Kistochki\Classes\Api\Resources\PostResource;

class Posts extends Controller
{
    private function all(Request $request)
    {
        // Post type
        $type = (int) $request->get('type');
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

        $posts = Post::when($type, function ($query) use ($type) {
            return $query->where('type', $type);
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
        });

        if ($limit) {
            $posts = $posts->limit($limit)->get();
        } elseif (is_numeric($perPage) && (int) $perPage > 0) {
            $posts = $posts->paginate($perPage);
        } else {
            $posts = $posts->get();
        }

        return PostResource::collection($posts)
          ->only($fields)
          ->hide($hideFields);
    }

    public function jobs(Request $request)
    {
        $request->request->add(['type' => Post::TYPE_JOB]);
        return $this->all($request);
    }

//    public function promotions(Request $request)
//    {
////        $request->request->add(['type' => Post::TYPE_PROMOTION]);
//        $request->request->add(['type' => 100]);
//        return $this->all($request);
//    }

    public function loyalties(Request $request)
    {
        $request->request->add(['type' => Post::TYPE_LOYALTY]);
        return $this->all($request);
    }

    public function abonements(Request $request)
    {
        $request->request->add(['type' => Post::TYPE_ABONEMENT]);
        return $this->all($request);
    }

    public function certificates(Request $request)
    {
        $request->request->add(['type' => Post::TYPE_CERTIFICATE]);
        return $this->all($request);
    }

    public function qualities(Request $request)
    {
        $request->request->add(['type' => Post::TYPE_QUALITY]);
        return $this->all($request);
    }

    public function item(Request $request, $item)
    {
        $post = Post::where('id', $item)
            ->orWhere('slug', $item)
            ->firstOrFail();
        return new PostResource($post);
    }
}
