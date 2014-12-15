<?php

/**
 * This is the model class for table "tbl_bludo".
 * 
 * The followings are the available columns in table 'tbl_bludo':
 * @property integer $id_bludo
 * @property string $bludoname
 * @property string $kategoriya
 * @property string $bludodate
 * @property string $info
 */
class Bludo extends CActiveRecord {

    // it's more nicely to work with orthodox English names
    const CATEGORY = 'kategoriya';
    const DISH_ID = 'id_bludo';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_bludo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('bludoname, kategoriya, bludodate, info', 'required'),
            array('bludoname', 'length', 'max' => 30),
            array('kategoriya', 'length', 'max' => 20),
            array('id_bludo, bludoname, kategoriya, bludodate, info', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'mymenu' => array(self::BELONGS_TO, 'Mymenu', 'id_bludo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_bludo' => '№',
            'bludoname' => 'Наименование',
            'kategoriya' => 'Категория',
            'bludodate' => 'Дата добавления',
            'info' => 'Информация',
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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_bludo', $this->id_bludo);
        $criteria->compare('bludoname', $this->bludoname, true);
        $criteria->compare('kategoriya', $this->kategoriya, true);
        $criteria->compare('bludodate', $this->bludodate, true);
        $criteria->compare('info', $this->info, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Bludo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getId() {
        return $this->id_bludo;
    }

    /**
     * I need to move this function from this model..
     * @return numeric array which contain column fields from object
     */
    public function objToArray($obj, $column) {
        $array = array();
        foreach ($obj as $o) {
            $array[] = $o->$column;
        }
        return $array;
    }

    public function filterByCategory($category = '') {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => self::CATEGORY . " LIKE :ctgry",
            'params' => array(':ctgry' => "%$category%")
        ));

        return $this;
    }

    public function getDishList($category = '', $search = '') {
        $criteria = new CDbCriteria;

        // dishes by category
        // maybe I need to identify these like another function
        if (strlen($category) > 0) {
            //$criteria->condition = self::CATEGORY . ' = :ctgry';
            //$criteria->params = array(':ctgry' => $category);
            $this->filterByCategory($category);
        }

        // condition from user search
        if (strlen($search) > 0) {
            $criteria->addSearchCondition('bludoname', $search, true, 'AND');
        }

        $criteria->order = self::CATEGORY;
        return($this->findAll($criteria));
    }

}
