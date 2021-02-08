<?php
/** @var $this \sabosuke\sabophp_mvc_core\View  */
/** @var $model \app\models\ContactForm  */

use \sabosuke\sabophp_mvc_core\form\Form;
use \sabosuke\sabophp_mvc_core\form\TextareaField;

$this->title ="Contact";
?>
<h1 class="mt-5 text-center">Contact</h1>

<div class="container mt-5">
    <?php $form = Form::begin('', 'post') ?>
    <?= $form->field($model, 'subject', 'Your Subject'); ?>
    <?= $form->field($model, 'email', 'Your Email'); ?>
    <?= $form->TextareaField($model, 'body', 'Your Message') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php \sabosuke\sabophp_mvc_core\form\Form::end(); ?>
</div>