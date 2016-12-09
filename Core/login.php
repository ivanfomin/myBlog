<?php

function checkLoginPassword($login, $password)
{

}

function login($login)
{
    setcookie('auth', $login, time() + 86400);
}

if(empty($_POST['login']) || empty($_POST['password'])) {
    header('Location: /form.html');
    exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

if(!checkLoginPassword($login, $password)) {
    header('Location: /form.html');
    exit;
}

login($login);
header('Location: /index.php');
exit;