<?php namespace Alza\Extension\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Alza\Extension\Models\Extension;

/**
 * Extensions Controller Back-end Controller
 */
class ExtensionsController extends Controller
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

        BackendMenu::setContext('Alza.Extension', 'extension', 'extensionscontroller');
    }

    public function apiIndex()
    {
        return Extension::with('extensionSkill')->get();
    }

    public function apiUpdate($id)
    {
        $extension = Extension::findOrFail($id);
        $extension->update(input());

        return $extension;
    }

    public function destroy($id)
    {
        $extension = Extension::findOrFail($id);
        $extension->delete();
        return response($extension, 200);
    }

    public function show($id)
    {
        return Extension::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return Extension::create($data);
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

