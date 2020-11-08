<?php

namespace App\Components;

use PDO;

/**
 * Класс конектор с БД
 * Class Db
 * @package components
 */
class Db
{
    static $connect = null;


    public static function getConnection()
    {
        //PDO
        if (self::$connect === null) {
            self::$connect = new PDO('mysql:dbname=shop;host=127.0.0.1', 'root', 'root');
            self::$connect->exec("set names utf8");
        }

        return self::$connect;
    }

}
