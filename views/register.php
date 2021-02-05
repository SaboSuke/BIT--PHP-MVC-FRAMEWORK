<?php
/** User: Sabo */
?>

<h1 class="mt-5 text-center">Create Your Account</h1>

<div class="container mt-5">
    <?php $form = \app\core\form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'first_name', 'First Name', 'Your first name...'); ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'last_name', 'Last Name', 'Your last name...'); ?>
        </div>
    </div>

    <?=$form->field($model, 'email', 'Email', 'Your email...')->emailField(); ?>

    <?= $form->field($model, 'password', 'Password', 'Your password...')->passwordField(); ?>

    <?= $form->field($model, 'password_validate', 'Confirm Password',  'Repeat password...')->passwordField(); ?>

    <button type="submit" class="btn btn-primary mb-5">Submit</button>
    <?php \app\core\form\Form::end() ?>
</div>