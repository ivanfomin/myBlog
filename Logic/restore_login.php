<?php
session_start();


require_once __DIR__ . '/../autoload.php';

use Model\User;

if ($_POST['password'] < 6) {

}

if (!empty($_POST['id']) && !empty($_POST['password']) && !empty($_POST['repeat_password'])) {

    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    if ($password !== $repeat_password) {
        echo "Пароли не совпадают!";
        ?>
        <br>
        <a href="/">Back</a>
        <?php
    } elseif (strlen($password) < 6) {
        echo "Пароль слишком короткий!";
        ?>
        <br>
        <a href="/">Back</a>
        <?php
    } else {
        $user = User::findById($_POST['id']);

        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->save();

        $login = $user->login;
        $_SESSION['login'] = $login;

        \Core\LoginUser::login($login);
        header('Location: /');
    }

}





