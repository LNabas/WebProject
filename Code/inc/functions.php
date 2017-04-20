<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/04/2017
 * Time: 12:39
 */

function str_random($length)
{
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}


function logged_only()
{
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    if(!isset($_SESSION['auth']))
    {
        $_SESSION['flash']['danger'] = "vous n'avez pas le droit";
        header('location: login.php');
        exit();
    }
}


function reconnect_from_cookie()
{

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    if(isset($_COOKIE['remember']) && !isset($_SESSION['auth']))
    {
        require_once "db.php";
        if(!isset($pdo))
        {
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode('==', $remember_token);
        $user_id = $parts[0];
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(['$users_id']);
        $user = $req->fetch();
        if($user)
        {
            $expected = $user_id . '==' . $user->remember_token . sha1($user->id . 'clé');
            if($expected == $remember_token)
            {
                session_start();
                $_SESSION['auth'] = $user;
                setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
            }
            else
            {
                setcookie('remember', null, -1);
            }
        }
        else
        {
            setcookie('remember', null, -1);
        }
    }
}