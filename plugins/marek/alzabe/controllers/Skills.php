<?php namespace Marek\AlzaBE\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\Skill;

/**
 * Skills Back-end Controller
 */
class Skills extends Controller
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

        BackendMenu::setContext('Marek.AlzaBE', 'alzabe', 'skills');
    }

    public function apiIndex()
    {
        return Skill::with('extension')->get();
    }

    public function apiUpdate($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update(input());

        return $skill;
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill ->delete();
        return response('Deleted', 200);
    }

    public function show($id)
    {
        return Skill::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return Skill::create($data);
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
