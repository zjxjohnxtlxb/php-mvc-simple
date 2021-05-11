<?php
/*
 * @Date: 2021-04-27 17:02:35
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-01 22:10:10
 * @FilePath: /php-mvc-framework/core/Response.php
 */

namespace app\core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $path)
    {
        header("Location: $path");
    }
}
