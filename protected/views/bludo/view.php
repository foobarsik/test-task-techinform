<div class="bludodetails">
    <h3><?php echo CHtml::encode($model->bludoname); ?></h3>
    <?php
    echo $model->bludodate;
    echo ' | ' . CHtml::link(CHtml::encode($model->kategoriya), array('index', 'category' => $model->kategoriya), array('class' => 'italic'));
    echo '<hr />';
    echo $model->info;
    ?>
</div>