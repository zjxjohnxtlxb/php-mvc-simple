<?php
/*
 * @Date: 2021-05-11 18:34:41
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:01:15
 * @FilePath: /php-mvc-framework/core/View.php
 */

namespace app\core;

class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->viewContent($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$APP->controller->layout ?? Application::$APP->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function viewContent($view, $params = [])
    {
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $$key = $value;
            }
        }
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
