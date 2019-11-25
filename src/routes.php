<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/','HomepageController');
    $app->get('/checkbox', 'CheckboxController');
    $app->get('/add','AddTodoController');
    $app->get('/complete', 'CompletePageController');
    $app->get('/delete', 'DeleteTodoController');
};
