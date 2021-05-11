<?php
/*
 * @Date: 2021-05-11 13:39:35
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 18:30:19
 * @FilePath: /php-mvc-framework/core/middlewares/AuthMiddelware.php
 */

namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

class AuthMiddelware extends BaseMiddleware
{
    public array  $actions = [];

    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$APP->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }
}
