<?php
/** @var $model \app\models\User */
?>

<h1 class="mt-5 text-center">Welcome Back</h1>

<div class="container mt-5">
    <?php $form = \app\core\form\Form::begin('', "post") ?>
    <?=$form->field($model, 'email', 'Your email...')->emailField(); ?>
    <?= $form->field($model, 'password', 'Your password...')->passwordField(); ?>
    <button type="submit" class="btn btn-primary mb-5">Submit</button>
    <?php \app\core\form\Form::end() ?>
</div>