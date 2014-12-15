<?php

class UserIdentity extends CUserIdentity {

    // Будем хранить id.
    protected $_id;

    public function authenticate() {
        $user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if(($user===null) || (md5('dfvgbh8183'.$this->password)!==$user->pass)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->_id = $user->id_user;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
