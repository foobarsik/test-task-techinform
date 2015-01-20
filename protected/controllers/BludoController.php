<?php
/**
 * Controller: Bludo
 *
 * - Generates a list of dishes id for the current user;
 * - Adds a new dish in user menu;
 * - Deletes a particular model.
 *
 * @author JeannieGold <jeanniegold@mail.ru>
 */

class BludoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays dish info.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Displays dish catalog on main page.
     */
    public function actionIndex($string = '') {
        $model = Bludo::model()->getDishList(Yii::app()->request->getParam('category'), $string);
 
        // формируем массив категорий для разбивки вывода блюд по категориям  
        $categorys = Bludo::model()->objToArray($model, Bludo::CATEGORY);
        sort($categorys);
        $count = count($categorys);

        // формируем массив id блюд из меню текущего пользователя, 
        // при наличии блюда в данном списке у пользователя не будет возможности 
        // добавить блюдо в меню повторно        
        $menu = Mymenu::model()->getUserMenuList();
        $menulist = Bludo::model()->objToArray($menu, Bludo::DISH_ID);

        $this->render('index', array(
            'model' => $model,
            'categorys' => $categorys,
            'count' => $count,
            'menu' => $menulist,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Bludo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Bludo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запрашиваемая страница не существует.');
        return $model;
    }

}
