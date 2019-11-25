<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function() {
        $db = new PDO('mysql:host=127.0.0.1;dbname=2do','root','password');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['TodoModel'] = new \Example\Factories\TodoModelFactory();
    $container['HomepageController'] = new \Example\Factories\HomepageControllerFactory();
    $container['CheckboxController'] = new \Example\Factories\CheckboxControllerFactory();
    $container['AddTodoController'] = new \Example\Factories\AddTodoControllerFactory();
    $container['CompletePageController'] = new \Example\Factories\CompletePageControllerFactory();
    $container['DeleteTodoController'] = new \Example\Factories\DeleteTodoControllerFactory();
};
