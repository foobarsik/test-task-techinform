<?php
/* @var $this BludoController */
/* @var $data Bludo */
?>

<div class="bludoview"> 
    <?php if (Yii::app()->user->checkAccess('user')): ?>
        <div class="addlink" id="bludo_<?php echo $bludo->getId() ?>">
            <?php
            if (!in_array($bludo->getId(), $menu))
                echo CHtml::ajaxLink(
                        CHtml::image(Yii::app()->request->baseUrl . '/images/add.png', 'Добавить'), Yii::app()->createUrl('/mymenu/neworder'), array(
                    'type' => 'POST',
                    'data' => array('bludo_id' => $bludo->getId()),
                    'beforeSend' => "function(){
                        $('#bludo_'+$bludo->id_bludo).addClass('loading');
                    }",
                    'complete' => "function(){
                        $('#bludo_'+$bludo->id_bludo).removeClass('loading');
                    }",
                    'success' => "function( data ){
                        $('#bludo_'+$bludo->id_bludo).fadeOut(500);
                        alert( 'Данное блюдо добавлено в ваше меню!');
                    }"), $htmlOptions = array('title' => 'Добавить блюдо в меню'));
            //else echo CHtml::image(Yii::app()->request->baseUrl . '/images/ok.png', 'Добавлено');
            ?>
        </div> 
    <?php endif; ?>
    <h3><?php echo CHtml::link(CHtml::encode($bludo->bludoname), array('view', 'id' => $bludo->id_bludo)); ?> </h3>
    <div class="clear"></div>
    <?php
    echo 'Категория: ' . CHtml::link(CHtml::encode($bludo->kategoriya), array('index', 'category' => $bludo->kategoriya), array('class' => 'italic'));
    echo ' | <span class="italic">' . CHtml::encode($bludo->bludodate) . '</span>';
    ?>
</div>
