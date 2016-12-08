<?php

function checkLoginPassword($login, $password)
{

}

function login($login)
{
    setcookie('auth', $login, time() + 86400);
}

function isUser()
{
    return isset($_COOKIE['auth']);
}

function getUser()
{
    return $_COOKIE['auth'];
}

if(!isUser()) {
    header('Location: /form.html');
    exit;
}