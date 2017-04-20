<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/04/2017
 * Time: 12:52
 */


$bdd = new PDO('mysql:dbname=test_web_project;host=localhost','root','root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
