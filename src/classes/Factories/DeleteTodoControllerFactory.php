<?php


namespace Example\Factories;


use Example\Controllers\DeleteTodoController;
use Psr\Container\ContainerInterface;

class DeleteTodoControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteTodoController
    {
        $model = $container['TodoModel'];
        $deleteTodoController = new DeleteTodoController($model);
        return $deleteTodoController;
    }

}