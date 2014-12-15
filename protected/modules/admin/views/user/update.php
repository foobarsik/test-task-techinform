<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user=>array('view','id'=>$model->id_user),
	'Update',
);

$this->menu=array(
	array('label'=>'Каталог пользователей', 'url'=>array('index')),
	array('label'=>'Добавить нового', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('view', 'id'=>$model->id_user)),
);
?>

<h1>Редактирование данных пользователя <?php echo $model->id_user; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>