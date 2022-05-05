<?php namespace Marek\AlzaBE\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\Profession;

/**
 * Professions Back-end Controller
 */
class Professions extends Controller
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

        BackendMenu::setContext('Marek.AlzaBE', 'alzabe', 'professions');
    }

    public function apiIndex()
    {
        return Profession::with('post')->get();
    }

    public function apiUpdate($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->update(input());

        return $profession;
    }

    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession ->delete();
        return response('Deleted', 200);
    }

    public function show($id)
    {
        return Profession::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return Profession::create($data);
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
