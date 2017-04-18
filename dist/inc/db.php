<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/04/2017
 * Time: 12:52
 */


$pdo = new PDO('mysql:dbname=test_web_projet;host=localhost','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
