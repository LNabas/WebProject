<?php

/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 13/04/2017
 * Time: 14:37
 */
class Auth
{

    public function user()
    {
        if(!$this->session->read('auth'))
        {
            return false;
        }
        return $this->session->read('auth');
    }

    public function connect($user)
    {
        $this->session->write('auth', $user);
    }

    public function connectFromCookie($db)
    {
        if(isset($_COOKIE['remember']) && !$this->user())
        {
            $remember_token = $_COOKIE['remember'];
            $parts = explode('==', $remember_token);
            $user_id = $parts[0];
            $user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id . 'ratonlaveurs']);
            if($user)
            {
                $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
                if ($expected == $remember_token)
                {
                    $this->connect($user);
                    setcookie('remember', $remember_token, time() +60*60*27*7);
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

    public function login($db, $username, $password, $remember = false)
    {
       $user = $db->query('SELECT * FROM users WHERE (username = :username or email = :username)', ['username' => $username])->fetch();
        if($password_verify($password, $user->password))
        {
            $this->connect($user);
            if($remember)
            {
                $this->remember($db, $user->id);
            }
            header('location: account')
        }
    }
}