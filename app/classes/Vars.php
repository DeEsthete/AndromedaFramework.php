<?php
namespace classes;


final class Vars
{
    private static $vars = [];

    private function __construct()
    {
    }

    static function set($key, $value){
        self::$vars[$key] = $value;
    }

    static function get($key){
        return self::$vars[$key];
    }
}