<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 13/04/2017
 * Time: 10:18
 */
class App
{

    static $db = null;

    static function getDatabase()
    {
        if(!self::$db)
        {
            self::$db = new Database('root', '', 'test_web_projet');
        }

        return self::$db;
    }

}