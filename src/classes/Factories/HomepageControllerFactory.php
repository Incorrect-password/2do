<?php


namespace Example\Factories;


use Example\Controllers\homepageController;
use Psr\Container\ContainerInterface;

class HomepageControllerFactory
{
    public function __invoke(ContainerInterface $container): HomepageController
    {
       $view = $container->get('renderer');
       $model = $container['TodoModel'];
       $homepageController = new HomepageController($model, $view);
       return $homepageController;
    }

}