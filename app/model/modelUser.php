<?php

class ModelUser extends ModelVerify {

    function initGlobalData()
    {
        Registry::set('login', null);
        Registry::set('message_login', "");
        Registry::set('message_register', "");
        Registry::set('admin', 0);
    }

    public function verifyLoginData($data) {
        $this->initGlobalData();
        switch ($this->verifyLoginPass($data, 'get_login')) {
            case 1:
                return true;
                break;
            case 0:
                Registry::set('message_login', "Не верный логин или пароль");
                break;
            case -1:
                Registry::set('message_login', "Логин и пароль должны быть заполнены");
                break;
            default:
                break;
        }
        return false;
    }

    public function verifyAndCreateUser($data) {
        $this->initGlobalData();
        switch ($this->verifyLoginPass($data, 'add_login')) {
            case 1:
                Registry::set('login', $data['login']);
                return true;
                break;
            case 0:
                Registry::set('message_register', "Введенный логин уже занят");
                break;
            case -1:
                Registry::set('message_register', "Все поля должны быть заполнены");
                break;
            default:
                break;
        }
        return false;
    }
}