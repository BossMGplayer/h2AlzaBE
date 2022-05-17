<?php namespace Alza\Language\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Alza\Language\Models\Language;

/**
 * Languages Controller Back-end Controller
 */
class LanguagesController extends Controller
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

        BackendMenu::setContext('Alza.Language', 'language', 'languagescontroller');
    }
    public function apiIndex()
    {
        return Language::with('languageSkill')->get();
    }

    public function apiUpdate($id)
    {
        $language = Language::findOrFail($id);
        $language->update(input());

        return $language;
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return response($language, 200);
    }

    public function show($id)
    {
        return Language::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return Language::create($data);
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
