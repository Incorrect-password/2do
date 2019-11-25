<?php


namespace Example\Factories;


use Example\Controllers\AddTodoController;
use Psr\Container\ContainerInterface;

class AddTodoControllerFactory
{
    public function __invoke(ContainerInterface $container): AddTodoController
    {
        $model = $container['TodoModel'];
        $addTodoController = new AddTodoController($model);
        return $addTodoController;
    }

}