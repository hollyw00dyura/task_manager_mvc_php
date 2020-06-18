<?php

class Registry {
    static private $data = [];

    public static function set($key, $value) {
        self::$data[$key] = $value;
    }

    public static function get($key) {
        $value = self::$data[$key] ?? null;
        return $value;
    }

    public static function remove($key) {
        if (array_key_exists($key, self::$data))
            unset(self::$data[$key]);
    }
}