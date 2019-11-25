<?php


namespace Example\Factories;


use Example\Controllers\CompletePageController;
use Psr\Container\ContainerInterface;

class CompletePageControllerFactory
{
    public function __invoke(ContainerInterface $container): CompletePageController
    {
        $model = $container['TodoModel'];
        $view = $container->get('renderer');
        $completePageController = new CompletePageController($model, $view);
        return $completePageController;
    }

}