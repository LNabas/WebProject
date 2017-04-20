<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 18/04/2017
 * Time: 10:39
 */
class Str
{
    static function random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
}