<?php namespace Marek\AlzaBE\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\PostPerson;

/**
 * Post People Back-end Controller
 */
class PostPeople extends Controller
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

        BackendMenu::setContext('Marek.AlzaBE', 'alzabe', 'postpeople');
    }

    public function apiIndex()
    {
        return PostPerson::all();
    }

    public function apiUpdate($id)
    {
        $postPerson = PostPerson::findOrFail($id);

        if (input('name')) {
            $postPerson->PostPerson = input('name');
        }

        if (input('surname')) {
            $postPerson->PostPerson = input('surname');
        }

        if (input('pay')) {
            $postPerson->PostPerson = input('pay');
        }

        if (input('description')) {
            $postPerson->PostPerson = input('description');
        }

        if (input('email')) {
            $postPerson->PostPerson = input('email');
        }

        if (input('phone')) {
            $postPerson->PostPerson = input('phone');
        }

        $postPerson->save();
        return $postPerson;
    }

    public function destroy($id)
    {
        $postPerson = PostPerson::findOrFail($id);
        $postPerson ->delete();
        return response('Deleted', 200);
    }

    public function show($id)
    {
        return PostPerson::findOrFail($id);
    }

    public function store()
    {
        $data = input();
        return PostPerson::create($data);
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
