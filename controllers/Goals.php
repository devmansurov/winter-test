<?php namespace Pp\Kistochki\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Pp\Kistochki\Models\Goal;

class Goals extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pp.Kistochki', 'menus', 'goals');
    }

    // public function index()
    // {
    //     parent::index();
    //     $goal = Goal::first();
    //     if($goal) {
    //         return redirect("pp/kistochki/goals/update/{$goal->id}");
    //     }
    //     return redirect('pp/kistochki/goals/create');
    // }
}
