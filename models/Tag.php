<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Enums\TagType;
use Pp\Kistochki\Classes\Helper;

/**
 * Model
 */
class Tag extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphedByMany = [
        'services'  => [
            'Pp\Kistochki\Models\Service',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable'
        ],
        'reviews'  => [
            'Pp\Kistochki\Models\Review',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable'
        ],
        'portfolios'  => [
            'Pp\Kistochki\Models\Portfolio',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable'
        ]
    ];

    public function scopeIsService($query)
    {
        return $query->where('status', true)
                     ->where('type', TagType::SERVICE)
                     ->orderBy('title', 'asc');
    }

    public function scopeIsReview($query)
    {
        return $query->where('status', true)
                     ->where('type', TagType::REVIEW)
                     ->orderBy('title', 'asc');
    }

    public function scopeIsPortfolio($query)
    {
        return $query->where('status', true)
                     ->where('type', TagType::PORTFOLIO)
                     ->orderBy('title', 'asc');
    }

    public function scopeIsPostType($query)
    {
        $type = request()->input('type');
        if ($type) {
            $postType = Helper::getPostType($type);
            return $query->where('status', true)
                     ->where('type', $postType['id'])
                     ->orderBy('title', 'asc');
        }
    }

    public function beforeCreate()
    {
        $routeNameOrPostType = request()->input('type', Helper::getRoute());
        // $type = request()->input('type');
        // if ($type) {
        //     $postType = Helper::getPostType($type);
        //     $this->type = $postType['id'];
        //     return;
        // }
        $this->type = match ($routeNameOrPostType) {
            'job' || 'promotion' || 'loyalty' || 'abonement' || 'certificate' || 'quality' => Helper::getPostType($routeNameOrPostType)['id'],
            'services' => 1,
            'reviews' => 2,
            'portfolios' => 3,
            default => $this->type
        };
    }

    public function filterFields($fields, $context = null)
    {
        if (Helper::isRoute('posts')) {
            $fields->type->hidden = true;
        }
    }
}
