<?php
/*
 * @Date: 2021-05-01 22:12:15
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-10 15:33:13
 * @FilePath: /php-mvc-framework/core/Session.php
 */

namespace app\core;


class Session
{
    protected const FLASH = 'flash';

    public function __construct()
    {
        session_start();
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH][$key] = $message;
    }

    public function getFlash($key)
    {
        $value = $_SESSION[self::FLASH][$key] ?? '';
        unset($_SESSION[self::FLASH][$key]);
        return $value;
    }
    
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function hasFlash($key)
    {
        return isset($_SESSION[self::FLASH][$key]);
    }
}
