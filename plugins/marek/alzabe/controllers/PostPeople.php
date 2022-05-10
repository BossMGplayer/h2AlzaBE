<?php namespace Marek\AlzaBE\Controllers;

use Backend\Facades\BackendMenu;
use Backend\Classes\Controller;
use Marek\AlzaBE\Models\PostPerson;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\JsonResponse;
use System\Models\File;

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
        $postPerson->update(input());

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

    public function store(Request $request): JsonResponse
    {
        $postPerson = new PostPerson();
        $postPerson->name = $request['name'];
        $postPerson->surname = $request['surname'];
        $postPerson->description = $request['description'];
        $postPerson->pay = $request['pay'];
        $postPerson->email = $request['email'];
        $postPerson->phone = $request['phone'];
        $postPerson->city = $request['city'];
        $postPerson->person_id = $request['person_id'];

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
                $postPerson->avatar = $file;
            }
        }
        $postPerson->save();

        return response()->json([
            'postperson' => $postPerson
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
