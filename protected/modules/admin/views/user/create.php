<?php
/* @var $this UserController */
/* @var $model User */


$this->menu=array(
	array('label'=>'Каталог пользователей', 'url'=>array('index')),
);
?>

<h1>Добавление нового пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>