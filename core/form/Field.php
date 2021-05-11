<?php
/*
 * @Date: 2021-04-29 15:18:42
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-02 17:27:02
 * @FilePath: /php-mvc-framework/core/form/Field.php
 */


namespace app\core\form;

use app\core\DbModel;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWARD = 'password';
    public const TYPE_NUMBER = 'number';

    public DbModel $dbmodel;
    public string $attribute;

    public function __construct(DbModel $dbmodel, $attribute, $type = self::TYPE_TEXT)
    {
        $this->dbmodel = $dbmodel;
        $this->attribute = $attribute;
        $this->type = $type;
    }

    public function __toString()
    {
        return sprintf(
            '<div class="form-group">
                <label>%s</label>
                <input type="%s" name="%s", value="%s" class="form-control %s">
                <div class="invalid-feedback">%s</div>
            </div>',
            $this->dbmodel->labels()[$this->attribute],
            $this->type,
            $this->attribute,
            $this->dbmodel->{$this->attribute},
            $this->dbmodel->hasError($this->attribute) ? 'is-invalid' : '',
            $this->dbmodel->getError($this->attribute)
        );
    }
}
