<?php
/** @var $model \app\models\User */
/** @var $this \app\core\View  */

$this->title ="Register";
?>

<h1 class="mt-5 text-center">Create Your Account</h1>

<div class="container mt-5">
    <?php $form = \app\core\form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'first_name', 'Your first name...'); ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'last_name', 'Your last name...'); ?>
        </div>
    </div>

    <?=$form->field($model, 'email',  'Your email...')->emailInputField(); ?>

    <?= $form->field($model, 'password', 'Your password...')->passwordInputField(); ?>

    <?= $form->field($model, 'password_validate', 'Repeat password...')->passwordInputField(); ?>

    <button type="submit" class="btn btn-primary mb-5">Submit</button>
    <?php \app\core\form\Form::end() ?>
</div>