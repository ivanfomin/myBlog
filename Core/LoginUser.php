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
    public static function checkLoginPassword($login, $password)
    {
        $user = User::findByLog($login);
        if (password_verify($password, $user->password)) {
            return $user;
        } else {
            return null;
        }
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
        if (isset($_COOKIE['auth'])) {
            return User::findByLog($_COOKIE['auth']);   //косяк с безопасностью
        } else {
            return null;
        }

    }
}