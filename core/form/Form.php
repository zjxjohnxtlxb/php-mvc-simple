<?php
/*
 * @Date: 2021-04-29 15:17:42
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-04-29 20:39:46
 * @FilePath: /php-mvc-framework/core/form/Form.php
 */

namespace app\core\form;

use app\core\Model;

class Form
{
    public function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
    }
    public function end()
    {
        echo '</form>';
    }
    public function field(Model $model, $attribute, $type = Field::TYPE_TEXT)
    {
        return new Field($model, $attribute, $type);
    }
}
