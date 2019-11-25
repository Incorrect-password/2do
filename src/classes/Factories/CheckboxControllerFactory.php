<?php


namespace Example\Factories;


use Example\Controllers\CheckboxController;
use Psr\Container\ContainerInterface;

class CheckboxControllerFactory
{
    public function __invoke(ContainerInterface $container):CheckboxController
    {
        $model = $container['TodoModel'];
        $checkboxController = new CheckboxController($model);
        return $checkboxController;
    }

}
