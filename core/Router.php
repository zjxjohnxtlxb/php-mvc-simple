<?php
/*
 * @Date: 2021-04-25 15:13:09
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 18:42:20
 * @FilePath: /php-mvc-framework/core/Router.php
 */

namespace app\core;

use app\core\exception\NotFoundException;

class Router
{
    protected Request $request;
    protected $routes = array('get' => [], 'post' => []);

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            $controller = new $callback[0]();
            Application::$APP->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }

            return call_user_func($callback, $this->request, $this->response);
        }
    }

    public function renderView($view, $params = [])
    {
        return Application::$APP->view->renderView($view, $params);
    }

    protected function renderContent($viewContent)
    {
        return Application::$APP->view->renderContent($viewContent);
    }
}
