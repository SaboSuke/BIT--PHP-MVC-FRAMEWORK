<?php
/** @var $this \sabosuke\bit_mvc_core\View  */
/** @var $model \app\models\ContactForm  */

use \sabosuke\bit_mvc_core\form\Form;
use \sabosuke\bit_mvc_core\form\TextareaField;
use \sabosuke\bit_mvc_core\form\SelectField;

$this->title ="Contact";
?>


<h1 class="mt-5 text-center">Contact</h1>

<div class="container mt-5">
    <?php $form = Form::begin('', 'post') ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'subject', 'Your Subject'); ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'email', 'Your Email'); ?>
        </div>
        <div class="col-md-12">
            <?= $select = new SelectField($model, 'Reason') ?>
            <?= $select->defaultOption('Default', 'Select Your Reason', 'selected') ?>
            <?= $select->addOption('1', 'I\'ll explain in the message') ?>
            <?= $select->addOption('2', 'I want to know more about BIT') ?>
            <?= $select::selectEnd() ?>
        </div>
        <?= $form->TextareaField($model, 'body', 'Your Message') ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php Form::end(); ?>
</div>