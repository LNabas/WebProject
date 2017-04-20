<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/04/2017
 * Time: 12:52
 */


$bdd = new PDO('mysql:dbname=test_web_projet;host=localhost','root','');
//$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u697959870_cours', 'u697959870_snafu', 'wu35sZPk7h');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
