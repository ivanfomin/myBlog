<?php
session_start();


require_once __DIR__ . '/../autoloads.php';



if(empty($_POST['login']) || empty($_POST['password'])) {
    header('Location: form.html');
    exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

if(!\Core\LoginUser::checkLoginPassword($login, $password)) {
    header('Location: form.html');
    exit;
}

$_SESSION['login'] = $login;


\Core\LoginUser::login($login);

header('Location: /Admin');
exit;