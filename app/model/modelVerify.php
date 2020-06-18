<?php

abstract class ModelVerify {
    function verifyDataEmpty($array_data) {
        foreach ($array_data as $value)
            if ($value === "") return false;
        return true;
    }
    function verifyEmail($data) {
        $email = $data['email'] ?? null;
        if ($email !== null && filter_var($email, FILTER_VALIDATE_EMAIL) !== false) // можно так же регулярным выражением
            return true;
        return false;
    }
    function verifyLoginPass($data, $name_func) {
        $flag_verify = -1;
        if ($this->verifyDataEmpty($data)) {
            $login = $data['login'] ?? null;
            $pass = $data['pass'] ?? null;
            if ($login !== null && $pass !== null) {
                if (Bd::$name_func($data))
                    $flag_verify = 1;
                else
                    $flag_verify = 0;
            }
        }
        return $flag_verify;
    }
    function verifyDataTask($data, $name_func) {
        if (!$this->verifyDataEmpty($data)) return -1;
        if ($this->verifyEmail($data)) return 0;
        Bd::$name_func($data);
        return 1;
    }
}