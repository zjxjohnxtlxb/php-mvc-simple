<?php
/*
 * @Date: 2021-05-11 17:24:34
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 18:03:42
 * @FilePath: /php-mvc-framework/core/exception/ForbiddenException.php
 */

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    public function __construct()
    {
        $message = "You don't have permission to access this page.";
        $code = 403;
        parent::__construct($message, $code);
    }
}
