<?php namespace Marek\AlzaBE\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\City;

/**
 * Cities Back-end Controller
 */
class Cities extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Marek.AlzaBE', 'alzabe', 'cities');
    }

    public function apiIndex()
    {
        return City::with('post')->get();
    }

    public function apiUpdate($id)
    {
        $city = City::findOrFail($id);

        if (input('City')) {
            $city->City = input('City');
        }

        $city->save();
        return $city;
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return response('Deleted', 200);
    }

    public function show($id)
    {
        return City::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return City::create($data);
    }

    public function callAction($method, $parameters = false)
    {
        $action = 'api' . ucfirst($method);
        if (method_exists($this, $action) && is_callable(array($this, $action))) {
            return call_user_func_array(array($this, $action), $parameters);
        } else {
            return parent::callAction($method, array_values($parameters));
        }
    }
}
