<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 09.12.16
 * Time: 13:10
 */

namespace Core;


use Model\User;

class LoginUser
{
    public static function checkLoginPassword($login)
    {
//        $users = ['pupkin' => '123', 'ivanov' => 'qwerty'];
//        return isset($users[$login]) && $password === $users[$login];
        $user = User::findByLog($login);
        return $user;
    }

    public static function login($login)
    {
        setcookie('auth', $login, time() + 86400, '/');
    }

    public static function logout()
    {
        unset($_COOKIE['auth']);
        setcookie('auth', '', time() - 1, '/');
    }

    public static function isUser()
    {
        return isset($_COOKIE['auth']);
    }

    public static function getUser()
    {
        return $_COOKIE['auth'];
    }

    public static function check()
    {

        return self::checkLoginPassword($_COOKIE['auth']);

    }
}