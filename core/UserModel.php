<?php
/*
 * @Date: 2021-05-10 15:53:12
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-10 15:56:41
 * @FilePath: /php-mvc-framework/core/UserModel.php
 */

namespace app\core;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
