<?php namespace Pp\Kistochki\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Pp\Kistochki\Models\Goal;
use Pp\Kistochki\Models\Settings;
use Pp\Kistochki\Classes\Helper;

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

    public function index()
    {
        parent::index();
        return $this->whenGoal(
            fn($goal) => redirect("pp/kistochki/goals/update/{$goal->id}"),
            fn() => redirect('pp/kistochki/goals/create')
        );
    }

    public function create($context = null)
    {
        return $this->whenGoal(
            fn($goal) => redirect("pp/kistochki/goals/update/{$goal->id}"),
            fn() => parent::create($context)
        );
    }

    public function update($recordId = null, $context = null)
    {
        return $this->whenGoal(
            fn($goal) => parent::update($recordId, $context),
            fn() => redirect('pp/kistochki/goals/create'),
            $recordId
        );
    }

    private function whenGoal($hasCb, $notFoundCb, $recordId = null) 
    {
        $user = \BackendAuth::getUser();
        if($user) {
            $defaultCity = Settings::get('defaultCity');
            $globalCity = Helper::getUserSettings($user, 'city', $defaultCity);
            $goal = Goal::where('city_id', $globalCity)->first();
            if($recordId != null && $goal && $goal->id != $recordId) {
                return redirect('pp/kistochki/goals');
            }
            if($goal != null) {
                return $hasCb($goal);
            }
            return $notFoundCb();
        }
    }
}
