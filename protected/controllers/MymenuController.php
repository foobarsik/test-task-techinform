<?php
/**
 * Controller: Mymenu
 *
 * - Displays a list of dishes for the current user menu;
 * - Adds a new dish in user menu;
 * - Deletes a particular model.
 *
 * @author JeannieGold <jeanniegold@mail.ru>
 */

class MymenuController extends Controller {

    public $layout = '//layouts/column1';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('create', 'delete', 'index'),
                'roles' => array('user'),
            ),
        );
    }

    /**
     * Displays a list of dishes for the current user menu ("Мое меню").
     */
    public function actionIndex() {
        $model = Mymenu::model()->getUserMenuList();
        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    /**
     * Adds a new dish in user menu.
     */
    public function actionNewOrder() {
        if (isset($_POST['bludo_id'])) {
            $model = new Mymenu();
            $model->addNewOrder(Yii::app()->request->getParam('bludo_id'));
        }
    } 
    
    /**
     * Deletes a particular model.
     */
    public function actionDelete() {
        if ((isset($_POST['menu_id']))) {
            $this->loadModel(Yii::app()->request->getParam('menu_id'))->delete();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Mymenu the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Mymenu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запрашиваемой страницы не существует.');
        return $model;
    }
}
