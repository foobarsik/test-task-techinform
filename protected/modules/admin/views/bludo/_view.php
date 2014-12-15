<?php
/* @var $this BludoController */
/* @var $data Bludo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bludo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bludo), array('view', 'id'=>$data->id_bludo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bludoname')); ?>:</b>
	<?php echo CHtml::encode($data->bludoname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kategoriya')); ?>:</b>
	<?php echo CHtml::encode($data->kategoriya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bludodate')); ?>:</b>
	<?php echo CHtml::encode($data->bludodate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
	<?php echo CHtml::encode($data->info); ?>
	<br />


</div>