<?php namespace Pp\Kistochki\Controllers;

use BackendMenu;
use Redirect;
use Request;        

class Settings extends \System\Controllers\Settings
{                       
    protected $author;
    protected $plugin;
    protected $code = 'settings'; // see registerSettings()
    protected $mainMenuId = 'menus'; // see registerNavigation()
    protected $sideMenuId = 'settings'; // see registerNavigation()

    public function __construct()
    {   
        parent::__construct();
        $this->viewPath = base_path().'/modules/system/controllers/settings';

        // Extract Author and Plugin name from current class path
        list($this->author, $this->plugin) = explode('\\', get_class());

        BackendMenu::setContext("Pp.Kistochki", $this->mainMenuId, $this->sideMenuId);
    }

    public function index()
    {   
        $url = sprintf('%s/update/%s/%s/%s', Request::url(), $this->author, $this->plugin, $this->code);

        return Redirect::to($url);
    }
}