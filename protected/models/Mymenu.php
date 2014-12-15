<?php

/**
 * This is the model class for table "tbl_mymenu".
 * 
 * - Finds all dishes id in current user menu;
 * - Adds a new dish in user menu.
 *
 * The followings are the available columns in table 'tbl_mymenu':
 * @property integer $id_mymenu
 * @property integer $id_user
 * @property integer $id_bludo
 */
class Mymenu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_mymenu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('id_user, id_bludo', 'required'),
            array('id_user, id_bludo', 'numerical', 'integerOnly' => true),
            array('id_mymenu, id_user, id_bludo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'id_user'),
            'bludo' => array(self::BELONGS_TO, 'Bludo', 'id_bludo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_mymenu' => 'Id Mymenu',
            'id_user' => 'Id User',
            'id_bludo' => 'Id Bludo',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id_mymenu', $this->id_mymenu);
        $criteria->compare('id_user', $this->id_user);
        $criteria->compare('id_bludo', $this->id_bludo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Mymenu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Finds all dishes id in current user menu
     */  
    public function getUserMenuList() {
        $criteria = new CDbCriteria;
        $criteria->select = array('id_mymenu, id_bludo');
        $criteria->condition = 'id_user = :user';
        $criteria->params = array(':user' => YII::app()->user->id);
        return($this->findAll($criteria));
    }
    
    /**
     * Adds a new dish in user menu.
     * @return boolean whether the order is saved successfully
     */    
    public function addNewOrder($bludoId) {
        $this->id_bludo = $bludoId;
        $this->id_user = YII::app()->user->id;
        return $this->save();
    }
    
}
