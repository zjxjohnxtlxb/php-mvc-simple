<?php
/*
 * @Date: 2021-05-11 13:01:17
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:05:42
 * @FilePath: /php-mvc-framework/views/profile.php
 */

/**
 * @var $this app\core\View
 */

$this->title = 'Profile';
?>

<h1>Profile</h1>
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