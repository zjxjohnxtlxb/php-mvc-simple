<?php
/*
 * @Date: 2021-05-12 08:56:46
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:03:00
 * @FilePath: /php-mvc-framework/core/form/BaseField.php
 */

namespace app\core\form;

use app\core\model\DbModel;

abstract class BaseField
{
    public DbModel $dbmodel;
    public string $attribute;
    
    abstract public function renderInput(): string;

    public function __construct(DbModel $dbmodel, $attribute)
    {
        $this->dbmodel = $dbmodel;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf(
            '<div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>',
            $this->dbmodel->labels()[$this->attribute],
            $this->renderInput(),
            $this->dbmodel->getError($this->attribute)
        );
    }
}
