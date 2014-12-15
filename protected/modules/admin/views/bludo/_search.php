<?php
/* @var $this BludoController */
/* @var $model Bludo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_bludo'); ?>
		<?php echo $form->textField($model,'id_bludo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bludoname'); ?>
		<?php echo $form->textField($model,'bludoname',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kategoriya'); ?>
		<?php echo $form->textField($model,'kategoriya',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bludodate'); ?>
		<?php echo $form->textField($model,'bludodate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'info'); ?>
		<?php echo $form->textArea($model,'info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->