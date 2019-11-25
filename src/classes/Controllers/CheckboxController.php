<?php


namespace Example\Controllers;


use Example\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class CheckboxController
{
    private $todoModel;

    /**
     * homepageController constructor.
     * @param $todoModel
     */
    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }


    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getQueryParams();
        $this->todoModel->completeTodo($data);
        return $response->withRedirect('/');
    }
}