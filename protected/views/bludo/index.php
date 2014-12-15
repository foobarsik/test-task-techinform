<h6> Поиск блюда </h6>

<?php
echo CHtml::beginForm(CHtml::normalizeUrl(array('bludo/index')), 'get', array('id' => 'filter-form'))
 . CHtml::textField('string', (isset($_GET['string'])) ?
                $_GET['string'] : '', array('id' => 'string'))
 . CHtml::submitButton('Найти')
 . CHtml::endForm();
?>
</br>

<div class="foodcontent">
<?php
if (!isset($_GET[category]))
    echo '<h1>Блюда дня</h1>';
else
    echo '<h1>Блюда категории <span class="italic">' . Yii::app()->request->getParam('category') . '</span></h1>';

$i = 1;
echo '<span class="ctgry">' . $categorys[0] . '</span>';

foreach ($model as $n => $model) {
    $this->renderPartial('_view', array('bludo' => $model, 'menu' => $menu));
    if ($model->kategoriya !== $categorys[$i]) {
        echo '<div class="clear"></div>';
        echo '<hr />';
        if ($i !== $count)
            echo '<span class="ctgry">' . $categorys[$i] . '</span>';
    }
// вывод в две колонки
//      if ($i % 2 !== 0) {
//          echo '<div class="clear"></div>';
//      }
    $i++;
}
if (Yii::app()->user->isGuest)
    echo 'Чтобы составить меню, вы должны быть пользователем данного сайта. Войдите или зарегистрируйтесь.';
?>
</div>