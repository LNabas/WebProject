<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 18/04/2017
 * Time: 09:38
 */
class App
{
    static $db = null;

    static function getDatabase(){
        if(!self::$db){
            self::$db = new Database('root', '', 'test_web_projet');
        }
        return self::$db;
    }

    static function getAuth(){
        return new Auth(Session::getInstance(), ['restriction_msg' => 'Inscris toi ou connecte toi pour avoir accès à cette page']);
    }

    static function redirect($page){
        header("location: $page");
        exit();
    }
}