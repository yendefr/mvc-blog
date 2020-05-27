<?php

use MyProject\View\View;

try {
    // Автозагрузка классов
    spl_autoload_register(function ($className)
    {
        $class = '../src/'.str_replace('\\', '/', $className).'.php';
        require_once $class;
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../src/routes.php';

    $isRouteFound = false;

    // Проверка наличия страницы на сайте с помощью роутинга
    foreach ($routes as $pattern => $controllerAndAction)
    {
        preg_match($pattern, $route, $matches);

        if (! empty($matches))
        {
            $isRouteFound = true;
            break;
        }
    }

    if (! $isRouteFound){
        throw new \MyProject\Exceptions\NotFoundException();
    }

    unset($matches[0]);

    // Массив с названием контроллера и его методом
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches); // Оператор ... передаёт элементы массива в качестве аргументов методу в том порядке, в котором они находятся в массиве.
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new View(__DIR__ . '/../templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
    $view = new View(__DIR__.'/../templates/errors');
    $view->renderHtml('404.php', [], 404);
} catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('401.php', ['error' => $e->getMessage()], 401);
}