<?php
/*
 * @Date: 2021-04-27 14:47:39
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:05:28
 * @FilePath: /php-mvc-framework/views/login.php
 */


use app\core\form\Field;

/**
 * @var $model app\models\Login
 * @var $form app\core\form\Form
 * @var $this app\core\View
 */

$this->title = 'Login';
?>

<h1>Login</h1>
<?php $form->begin("", "post") ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password', Field::TYPE_PASSWARD) ?>
<div class="form-group mt-2">
    <button class="btn btn-success">Submit</button>
</div>
<?php $form->end() ?>