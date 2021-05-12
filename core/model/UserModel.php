<?php
/*
 * @Date: 2021-05-10 15:53:12
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 12:59:51
 * @FilePath: /php-mvc-framework/core/model/UserModel.php
 */

namespace app\core\model;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
