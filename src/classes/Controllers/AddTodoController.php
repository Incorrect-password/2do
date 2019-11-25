<?php


namespace Example\Controllers;

use Example\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class AddTodoController
{
    private $todoModel;

    /**
     * AddTodoController constructor.
     * @param $todoModel
     */
    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }


    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getQueryParams();
        if($data['newTodo']!='') {
            $this->todoModel->addTodo($data['newTodo']);
            return $response->withRedirect('/');
        }else{
            return $response->withRedirect('/');
        }
    }

}