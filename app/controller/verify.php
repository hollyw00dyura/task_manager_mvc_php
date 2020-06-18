<?php

class Verify {
    protected function verify_login($array_data) {
        $login = $array_data['login'] ?? null;
        $pass = $array_data['pass'] ?? null;
        if ($login === "") return false;
        if ($pass === "") return false;
        return true;
    }
}