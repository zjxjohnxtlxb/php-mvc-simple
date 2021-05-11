<?php
/*
 * @Date: 2021-05-11 13:36:25
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 13:41:38
 * @FilePath: /php-mvc-framework/core/middlewares/BaseMiddleware.php
 */

namespace app\core\middlewares;

abstract class BaseMiddleware
{
    abstract public function execute();
}
