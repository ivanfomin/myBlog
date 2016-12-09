<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 09.12.16
 * Time: 13:10
 */

namespace Core;


class LoginUser
{
    public static function checkLoginPassword($login, $password)
    {
        $users = ['pupkin' => '123', 'ivanov' => 'qwerty'];
        return isset($users[$login]) && $password === $users[$login];

    }

    public static function login($login)
    {
        setcookie('auth', $login, time() + 86400, '/');
    }

    public static function logout()
    {
        var_dump($_COOKIE);
        unset($_COOKIE['auth']);
        setcookie('auth',time() - 3600);
        var_dump($_COOKIE);
    }

    public static function isUser()
    {
        return isset($_COOKIE['auth']);
    }

    public static function getUser()
    {
        return $_COOKIE['auth'];
    }
}