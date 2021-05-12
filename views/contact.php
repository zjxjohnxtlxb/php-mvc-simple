<?php
/*
 * @Date: 2021-04-27 14:47:39
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 12:20:26
 * @FilePath: /php-mvc-framework/views/contact.php
 */

/**
 * @var $model app\models\Contact
 * @var $form app\core\form\Form
 * @var $this app\core\View
 */

$this->title = 'Contact';
?>

<h1>Contact us</h1>
<?php $form->begin("", "post") ?>
<?php echo $form->inputField($model, 'subject') ?>
<?php echo $form->inputField($model, 'email') ?>
<?php echo $form->textareaField($model, 'body') ?>
<div class="form-group mt-2">
    <button class="btn btn-primary">Submit</button>
</div>
<?php $form->end() ?>