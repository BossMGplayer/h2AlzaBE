<?php namespace Marek\AlzaBE\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\LanguageSkill;

/**
 * Language Skills Back-end Controller
 */
class LanguageSkills extends Controller
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

        BackendMenu::setContext('Marek.AlzaBE', 'alzabe', 'languageskills');
    }

    public function apiIndex()
    {
        return LanguageSkill::all();
    }

    public function apiUpdate($id)
    {
        $languageskill = LanguageSkill::findOrFail($id);
        $languageskill->update(input());

        return $languageskill;
    }

    public function destroy($id)
    {
        $languageskill = LanguageSkill::findOrFail($id);
        $languageskill->delete();
        return response('Deleted', 200);
    }

    public function show($id)
    {
        return LanguageSkill::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return LanguageSkill::create($data);
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
