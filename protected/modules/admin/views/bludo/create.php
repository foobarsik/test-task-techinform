<?php
/* @var $this BludoController */
/* @var $model Bludo */

$this->menu=array(
	array('label'=>'Каталог блюд', 'url'=>array('index')),
);
?>

<h1>Добавление нового блюда</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>