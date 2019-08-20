<?php

session_start();


require_once __DIR__ . '/../autoload.php';

use Model\User;
use Core\ConfirmUser;

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['email'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $repeat_password = htmlspecialchars($_POST['repeat_password']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $user = User::findByLog($login);
    $find_email = User::findByEmail($email);

    if ($user) {
        echo "Пользователь уже существует!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } elseif ($find_email) {
        echo "Пользователь с таким почтовым ящиком уже существует!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } elseif ($password !== $repeat_password) {
        echo "Пароли не совпадают!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } elseif (strlen($password) < 6) {
        echo "Пароль слишком короткий!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } else {
        $user = new User();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->name = $name;
        $user->role = 1;
        $user->email = $email;
        $user->save();
        $confirmUser = new ConfirmUser($user);
        $confirmUser->sendConfirm();
        //$_SESSION['login'] = $login;
        //\Core\LoginUser::login($login);

        header('Location: /Templates/confirm.html');
    }


} else { ?>
    <div class="container mregister">
        <div id="login">
            <h1>Регистрация</h1>
            <form name="registerform" id="registerform" action="register.php" method="post">
                <p>
                    <label for="user_login">Имя<br/>
                        <input type="text" name="name" id="name" class="input" size="32" value=""/></label>
                </p>
                <p>
                    <label for="login">Логин<br/>
                        <input type="text" name="login" id="login" class="input" value="" size="20"/></label>
                </p>
                <p>
                    <label for="email">Почтовый ящик<br/>
                        <input type="email" name="email" id="email" class="input"/></label>
                </p>
                <p>
                    <label for="user_pass">Пароль<br/>
                        <input type="password" name="password" id="password" class="input" value="" size="32" min="6"/></label>
                </p>

                <p>
                    <label for="user_pass_repeat">Повторите пароль<br/>
                        <input type="password" name="repeat_password" id="repeat_password" class="input" value=""
                               size="32" min="6"/></label>
                </p>


                <button type="submit">Регистрация</button>

                <p class="regtext">Уже есть аккаунт? <a href="login.php">Войти</a>!</p>
            </form>

        </div>
    </div>
<?php }