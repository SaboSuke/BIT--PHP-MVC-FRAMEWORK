<?php
/** @var $this \app\core\View  */
/** @var $model \app\models\ContactForm  */

use \app\core\form\Form;
use \app\core\form\TextareaField;

$this->title ="Contact";
?>
<h1 class="mt-5 text-center">Contact</h1>

<div class="container mt-5">
    <?php $form = Form::begin('', 'post') ?>
    <?= $form->field($model, 'subject', 'Your Subject'); ?>
    <?= $form->field($model, 'email', 'Your Email'); ?>
    <?= $form->TextareaField($model, 'body', 'Your Message') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php \app\core\form\Form::end(); ?>
</div>