<?php


namespace Example\Factories;


use Example\Models\TodoModel;
use Psr\Container\ContainerInterface;

class TodoModelFactory
{
    public function __invoke(ContainerInterface $container): TodoModel
    {
        $db = $container->get('db');
        return new TodoModel($db);
    }

}