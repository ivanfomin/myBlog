<?php
session_start();


require_once __DIR__ . '/../autoload.php';


if (empty($_POST['login']) || empty($_POST['password'])) {
    $message = 'Оба поля обязательны!';
    header('Location: ' . "/Index/Enter/" . $message);
    exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

$user = \Core\LoginUser::checkLoginPassword($login, $password);
if (!$user) {
    $message = 'Не правильный логин - пароль!';
    header('Location: ' . "/Index/Enter/" . $message);
    exit;
}

if ($user->active != 1) {
     $message = 'Не пройдено подтверждение!';
    header('Location: ' . "/Index/Enter/" . $message);
    exit;
}

$_SESSION['login'] = $login;

\Core\LoginUser::login($login);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;