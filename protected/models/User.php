<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id_user
 * @property string $username
 * @property string $pass
 * @property string $email
 * @property string $address
 * @property string $tel
 * @property string $role
 */
class User extends CActiveRecord {

//    const ROLE_ADMIN = 'admin';
//    const ROLE_USER = 'user';

    public $verifyCode;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, pass, email, address, tel', 'required'),
            array('role', 'default', 'value' => 'user'),
            array('email', 'email'),
            array('email', 'unique', 'message' => 'Данный email уже зарегистрирован в системе'),
            array('username', 'unique', 'message' => 'Пользователь с таким логином уже существует'),
            array('username', 'match', 'pattern' => '/^([а-яА-ЯёЁa-zA-Z][а-яА-ЯёЁa-zA-Z0-9-_\.]{2,20}+)$/u', 'message' => 'В поле "Логин" допустимы только буквы и цифры от 0 до 9. Допускаются имена не короче трех символов, первый символ обязательно буква.'),
            array('username, tel', 'length', 'max' => 15),
            array('email', 'length', 'max' => 20),
            array('address', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_user, username, pass, email, address, tel, role', 'safe', 'on' => 'search'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'registration'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'username' => 'Логин',
            'pass' => 'Пароль',
            'email' => 'Email',
            'address' => 'Адрес',
            'tel' => 'Телефон',
            '$verifyCode' => 'Код с картинки',
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
        $criteria->compare('id_user', $this->id_user);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('role', $this->role, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
//        if ($this->isNewRecord) {
//            $this->role = user;
//        }
        $this->pass = md5('dfvgbh8183' . $this->pass); //тут могла бы быть динамическая соль, а лучше crypt()
        return parent::beforeSave();
    }

}
