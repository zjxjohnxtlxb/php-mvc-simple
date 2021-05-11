<?php
/*
 * @Date: 2021-05-11 18:07:49
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 19:07:13
 * @FilePath: /php-mvc-framework/views/_error.php
 */

/**
 * @var $exception \Exception
 * @var $this app\core\View
 */

$this->title = $exception->getCode();
?>

<h1>Error</h1>
<p><?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?> </p>