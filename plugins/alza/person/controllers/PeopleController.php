<?php namespace Alza\Person\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Alza\Person\Models\Person;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\JsonResponse;
use System\Models\File;

/**
 * People Controller Back-end Controller
 */
class PeopleController extends Controller
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

        BackendMenu::setContext('Alza.Person', 'person', 'peoplecontroller');
    }
    public function apiIndex()
    {
        return Person::all();
    }

    public function apiUpdate($id): JsonResponse
    {
        $person = Person::findOrFail($id);
        $person->update(input());

        $img = input('avatar');
        if ($img) {
            $pattern = '/^data:image\/(.*?);.*base64,(.+)/';
            if (preg_match($pattern, $img, $matches)) {
                $ext = $matches[1];
                $data = $matches[2];
                $data = str_replace(' ', '+', $data);
                $imageData = base64_decode($data);

                $name = str_replace('.', '', uniqid(null, true));
                $disk_name = !empty($ext) ? $name.'.'.$ext : $name;
                $file = (new File)->fromData($imageData, $disk_name);
                $person->avatar = $file;
            }
        }
        $person->save();

        return response()->json([
            'person' => $person
        ], 201);
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person ->delete();
        return response($person, 200);
    }

    public function show($id)
    {
        return Person::findOrFail($id);
    }

    public function store(Request $request): JsonResponse
    {
        $person = new Person();
        $person->name = $request['name'];
        $person->surname = $request['surname'];
        $person->description = $request['description'];
        $person->pay = $request['pay'];
        $person->email = $request['email'];
        $person->phone = $request['phone'];
        $person->city = $request['city'];
        //$person->user_id = $request['user_id'];

        $img = input('avatar');
        if ($img) {
            $pattern = '/^data:image\/(.*?);.*base64,(.+)/';
            if (preg_match($pattern, $img, $matches)) {
                $ext = $matches[1];
                $data = $matches[2];
                $data = str_replace(' ', '+', $data);
                $imageData = base64_decode($data);

                $name = str_replace('.', '', uniqid(null, true));
                $disk_name = !empty($ext) ? $name.'.'.$ext : $name;
                $file = (new File)->fromData($imageData, $disk_name);
                $person->avatar = $file;
            }
        }
        $person->save();

        return response()->json([
            'person' => $person
        ], 201);
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
