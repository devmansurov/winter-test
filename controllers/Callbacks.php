<?php namespace Pp\Kistochki\Controllers;

use BackendMenu;
use Illuminate\Http\Request;
use Backend\Classes\Controller;
use Pp\Kistochki\Models\Callback;
use Illuminate\Support\Facades\Validator;

class Callbacks extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'    ];
    
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Pp.Kistochki', 'menus', 'callbacks');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city'  => 'required|string|exists:pp_kistochki_cities,id',
            'phone' => 'required|digits:11|not_in:78123333343,74951370000,74950238070',
        ]);

        if ($validator->fails()) {
            return response()->json([]);
        }

        $data = [
            'city_id' => $request->get('city'),
            'ip' => $request->header('X-Real-IP') ?? $request->ip(),
            'phone' => (int) $request->get('phone'),
            'page' => $request->get('page'),
            'user_agent' => $request->header('user-agent') ?? $request->userAgent(),
        ];

        Callback::create($data);
    }
}
