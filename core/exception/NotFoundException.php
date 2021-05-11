<?php
/*
 * @Date: 2021-05-11 18:15:50
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 18:24:30
 * @FilePath: /php-mvc-framework/core/exception/NotFoundException.php
 */

namespace app\core\exception;

class NotFoundException extends \Exception
{
    public function __construct()
    {
        $message = "Page not found.";
        $code = 404;
        parent::__construct($message, $code);
    }
}
