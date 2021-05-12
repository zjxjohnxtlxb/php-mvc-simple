<?php
/*
 * @Date: 2021-04-29 15:17:42
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:02:07
 * @FilePath: /php-mvc-framework/core/form/Form.php
 */

namespace app\core\form;

use app\core\model\Model;
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
    public function inputField(Model $model, $attribute, $type = InputField::TYPE_TEXT)
    {
        return new InputField($model, $attribute, $type);
    }
    public function textareaField(Model $model, $attribute)
    {
        return new TextareaField($model, $attribute);
    }
}
