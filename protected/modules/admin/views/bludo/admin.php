<?php
/* @var $this BludoController */
/* @var $model Bludo */

$this->menu=array(
	array('label'=>'Добавить новое блюдо', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bludo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление каталогом блюд</h1>

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
	'id'=>'bludo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_bludo',
		'bludoname',
		'kategoriya',
		'bludodate',
		'info',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
