<?php


namespace Example\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class DeleteTodoController
{
    private $model;

    /**
     * DeleteTodoController constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response)
    {
        $data = $request->getQueryParams();
        $this->model->deleteTodo($data);
        return $response->withRedirect('/complete');
    }
}