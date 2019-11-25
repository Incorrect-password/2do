<?php


namespace Example\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class homepageController
{
    private $todoModel;
    private $homepageView;

    /**
     * homepageController constructor.
     * @param $todoModel
     * @param $homepageView
     */
    public function __construct($todoModel, $homepageView)
    {
        $this->todoModel = $todoModel;
        $this->homepageView = $homepageView;
    }


    public function __invoke(Request $request, Response $response)
    {
        $todos = $this->todoModel->getTodos();
        return $this->homepageView->render($response, 'index.phtml', ['todos' => $todos]);
    }
}