<?php

namespace common\models;

use Yii;

class AdminLoginForm extends LoginForm
{
    private $_user;
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByAdminUsername($this->username);
        }

        return $this->_user;
    }
}
