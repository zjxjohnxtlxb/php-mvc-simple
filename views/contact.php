<?php
/*
 * @Date: 2021-04-27 14:47:39
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:06:15
 * @FilePath: /php-mvc-framework/views/contact.php
 */

/**
 * @var $this app\core\View
 */

$this->title = 'Contact';
?>

<h1>Contact us</h1>
<form action="" method="post">
    <div class="mb-3 form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" name="subject">
    </div>
    <div class="mb-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3 form-group">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>