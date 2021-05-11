<?php
/*
 * @Date: 2021-04-27 19:44:05
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 17:43:53
 * @FilePath: /php-mvc-framework/core/Controller.php
 */

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
    public ?string $layout = 'main';
    public string $action = '';

    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public static function render($view, $params = [])
    {
        return Application::$APP->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middlewares)
    {
        $this->middlewares[] = $middlewares;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
