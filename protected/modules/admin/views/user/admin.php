<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Добавить нового пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

<p>
В поиске по колонкам вы можете использовать операции сравнения: 
<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> или <b>=</b>, знак сравнения ставится первым.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_user',
		'username',
		'pass',
		'email',
		'address',
		'tel',
		'role',
	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
