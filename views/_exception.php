<?php
/** User: Sabo */

/** @var $exception \Exception */
/** @var $this \app\core\View  */

$this->title = $exception->getCode()." Exception";

?>

<h3 class='text-center mt-5 bg-danger text-white p-5'>
    <?= $exception->getCode() ?> - <?= $exception->getMessage() ?>
</h3>