<?php


namespace Example\Controllers;


use Example\Models\TodoModel;
use Slim\Http\Request;
use Slim\Http\Response;

class CompletePageController
{
    private $todoModel;
    private $completeView;

    /**
     * CompletePageController constructor.
     * @param $completeView
     * @param $todoModel
     */
    public function __construct(TodoModel $todoModel, $completeView)
    {
        $this->todoModel = $todoModel;
        $this->completeView = $completeView;
    }

    public function __invoke(Request $request, Response $response)
    {
        $completeTodos = $this->todoModel->getComplete();
        return $this->completeView->render($response, 'complete.phtml',['todos' => $completeTodos]);
    }

}