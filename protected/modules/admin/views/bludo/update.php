<?php
/* @var $this BludoController */
/* @var $model Bludo */

$this->breadcrumbs=array(
	'Bludos'=>array('index'),
	$model->id_bludo=>array('view','id'=>$model->id_bludo),
	'Update',
);

$this->menu=array(
	array('label'=>'Каталог блюд', 'url'=>array('index')),
	array('label'=>'Добавить новое блюдо', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id_bludo)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bludo),'confirm'=>'Точно удалить?')),
);
?>

<h1>Update Bludo <?php echo $model->id_bludo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>