<?php
/*
 * @Date: 2021-04-27 14:47:39
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:04:48
 * @FilePath: /php-mvc-framework/views/register.php
 */

use app\core\form\Field;

/**
 * @var $model app\models\User
 * @var $form app\core\form\Form
 * @var $this app\core\View
 */

$this->title = 'Register';
?>

<h1>Create an account</h1>
<?php $form->begin("", "post") ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname') ?>
    </div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password', Field::TYPE_PASSWARD) ?>
<?php echo $form->field($model, 'confirmPassword', Field::TYPE_PASSWARD) ?>
<div class="form-group mt-2">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<?php $form->end() ?>