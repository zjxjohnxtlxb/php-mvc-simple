<?php
/*
 * @Date: 2021-04-29 15:18:42
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:02:23
 * @FilePath: /php-mvc-framework/core/form/InputField.php
 */


namespace app\core\form;

use app\core\model\DbModel;

class InputField extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWARD = 'password';
    public const TYPE_NUMBER = 'number';

    public DbModel $dbmodel;
    public string $attribute;

    public function __construct(DbModel $dbmodel, $attribute, $type = self::TYPE_TEXT)
    {
        $this->type = $type;
        parent::__construct($dbmodel, $attribute);
    }

    public function renderInput(): string
    {
        return sprintf(
            '<input type="%s" name="%s", value="%s" class="form-control %s">',
            $this->type,
            $this->attribute,
            $this->dbmodel->{$this->attribute},
            $this->dbmodel->hasError($this->attribute) ? 'is-invalid' : ''
        );
    }
}
