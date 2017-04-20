<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 18/04/2017
 * Time: 09:41
 */

spl_autoload_register('app_autoload');

function app_autoload($class){
    require "class/$class.php";
}