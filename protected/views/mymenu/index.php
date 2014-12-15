<h1>Мое меню</h1>

<ol class="menulist">
    <?php foreach ($model as $n => $model): ?>
        <li id="menu_<?php echo $model->id_mymenu ?>">
            <?php echo CHtml::link(CHtml::encode($model->bludo->bludoname), array('/bludo/view', 'id' => $model->bludo->getId())); ?>
            <div class="deletelink">
                <?php
                echo CHtml::ajaxLink(
                        CHtml::image(Yii::app()->request->baseUrl . '/images/del.png', 'Удалить'), Yii::app()->createUrl('/mymenu/delete'), array(
                    'type' => 'POST',
                    'data' => array('menu_id' => $model->id_mymenu),
                    'success' => "function( data )
                        {
                        $('#menu_'+$model->id_mymenu).fadeOut(500);
                        }"), $htmlOptions = array('title' => 'Удалить блюдо из меню'));
                ?>
            </div> 
            <hr />
        </li>
    <?php endforeach; ?>
</ol>
