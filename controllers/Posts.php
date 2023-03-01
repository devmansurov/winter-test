<?php

namespace Pp\Kistochki\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;
use Pp\Kistochki\Classes\Helper;

class Posts extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        $postType = request()->get('type');
        // if($postType == 'promotion') {
        //     BackendMenu::setContext('Pp.Kistochki', 'promotion', 'promotion');
        // }
        $this->vars['postTypes'] = collect(Helper::getPostTypes())->pluck('title', 'type')->toArray();
    }

    public function index($userId = null)
    {
        $this->asExtension('ListController')->index();
    }

    public function listExtendQuery($query)
    {
        $type = request()->input('type');
        if ($type) {
            $postType = Helper::getPostType($type);
            if ($postType) {
                $query->where('type', $postType['id']);
            }
        }
    }

    public function create_onSave($context = null)
    {
        parent::create_onSave($context);
        return $this->redirectByPostType();
    }

    public function update_onSave($context = null)
    {
        parent::update_onSave($context);
        return $this->redirectByPostType();
    }

    public function update_onDelete($recordId = null)
    {
        parent::update_onDelete($recordId);
        return $this->redirectByPostType();
    }

    public function redirectByPostType()
    {
        $type = request()->input('type');
        $type = $type ? "?type=$type" : "";

        return Backend::redirect("pp/kistochki/posts$type");
    }
}
