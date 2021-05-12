<?php
/*
 * @Date: 2021-05-12 12:07:53
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:02:41
 * @FilePath: /php-mvc-framework/core/form/TextareaField.php
 */

namespace app\core\form;

class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-control %s">%s</textarea>',
            $this->attribute,
            $this->dbmodel->hasError($this->attribute) ? 'is-invalid' : '',
            $this->dbmodel->{$this->attribute}
        );
    }
}
