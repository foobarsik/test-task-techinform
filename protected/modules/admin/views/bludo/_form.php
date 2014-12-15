<?php
/* @var $this BludoController */
/* @var $model Bludo */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'bludo-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    
    $cs = Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/date/jquery.js', CClientScript::POS_END);
    $cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/date/jquery.datetimepicker.js', CClientScript::POS_END);
    $cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/init_date.js', CClientScript::POS_END);
    $cs->registerCssFile(Yii::app()->request->baseUrl . '/js/date/jquery.datetimepicker.css');
    ?>

    <p class="note">Поля со<span class="required">*</span> обязательны.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'bludoname'); ?>
        <?php echo $form->textField($model, 'bludoname', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'bludoname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'kategoriya'); ?>
        <?php echo $form->textField($model, 'kategoriya', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'kategoriya'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'bludodate'); ?>
        <?php echo $form->textField($model, 'bludodate', array('id' => 'datepicker')); ?>
        <?php echo $form->error($model, 'bludodate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'info'); ?>
        <?php echo $form->textArea($model, 'info', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'info'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->