<?php

namespace Pp\Kistochki\Models;

use Model;
use Pp\Kistochki\Enums\PostType;
use Pp\Kistochki\Classes\Helper;

/**
 * Model
 */
class Post extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pp_kistochki_posts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $morphToMany = [
        'tags' => [
            'Pp\Kistochki\Models\Tag',
            'table' => 'pp_kistochki_taggables',
            'name' => 'taggable',
            'scope' => 'isPostType'
        ],
        'images' => [
            'Pp\Kistochki\Models\Image',
            'table' => 'pp_kistochki_imageables',
            'name' => 'imageable'
        ]
    ];

    public $belongsTo = [
        'city' => [
            'Pp\Kistochki\Models\City',
        ],
    ];

    public $hasMany = [
        'promotions' => [
            'Pp\Kistochki\Models\Post',
            'scope' => 'isPromotion'
        ]
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public function beforeCreate()
    {
        $type = request()->input('type');
        if ($type) {
            $postType = Helper::getPostType($type);
            $this->type = $postType['id'];
        }
    }

    public function scopeIsPromotion($query)
    {
        return $query->where('type', PostType::PROMOTION)->latest();
    }

    public function filterFields($fields, $context = null)
    {
        $type = request()->input('type');
        if ($type) {
            $postType = Helper::getPostType($type);
            if ($postType['id'] == PostType::JOB) {
                $fields->description->hidden = false;
            } elseif ($postType['id'] == PostType::PAGE) {
                $fields->tags->hidden = true;
                $fields->images->hidden = true;
                $fields->status->hidden = true;
                $fields->description->hidden = true;
                $fields->meta_title->hidden = false;
                $fields->meta_desc->hidden = false;
                $fields->promotions->hidden = false;
                $fields->slug->readOnly = true;
            } elseif ($postType['id'] == PostType::NEWS) {
                $fields->excerpt->hidden = false;
                $fields->description->hidden = false;
                $fields->meta_title->hidden = false;
                $fields->meta_desc->hidden = false;
                $fields->city->hidden = false;
                $fields->slug->readOnly = true;
            } elseif ($postType['id'] == PostType::PROMOTION) {
                // $fields->excerpt->hidden = false;
                $fields->description->hidden = false;
                $fields->meta_title->hidden = false;
                $fields->meta_desc->hidden = false;
                $fields->slug->readOnly = true;
                $fields->hit->hidden = false;
            }
        }
    }
}
