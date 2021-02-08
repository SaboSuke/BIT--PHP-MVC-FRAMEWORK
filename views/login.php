<?php
    /** @var $model \app\models\User */
    /** @var $this \sabosuke\sabophp_mvc_core\View  */

    $this->title ="Login";
?>

<h1 class="mt-5 text-center">Welcome Back</h1>

<div class="container mt-5">
    <?php $form = \sabosuke\sabophp_mvc_core\form\Form::begin('', "post") ?>
    <?=$form->field($model, 'email', 'Your email...')->emailInputField(); ?>
    <?= $form->field($model, 'password', 'Your password...')->passwordInputField(); ?>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
    <?php \sabosuke\sabophp_mvc_core\form\Form::end() ?>
</div>