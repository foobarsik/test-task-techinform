<?php
/* @var $this BludoController */
/* @var $model Bludo */

$this->breadcrumbs=array(
	'Кталог блюд'=>array('index')
);

$this->menu=array(
	array('label'=>'Каталог блюд', 'url'=>array('index')),
	array('label'=>'Добавить новое блюдо', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id_bludo)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bludo),'confirm'=>'Точно удалить?')),
);
?>

<h1>Блюдо #<?php echo $model->id_bludo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bludo',
		'bludoname',
		'kategoriya',
		'bludodate',
		'info',
	),
)); ?>
