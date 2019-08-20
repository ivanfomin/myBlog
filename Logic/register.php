<?php

session_start();


require_once __DIR__ . '/../autoload.php';

use Model\User;

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $repeat_password = htmlspecialchars($_POST['repeat_password']);
    $name = htmlspecialchars($_POST['name']);


    $user = User::findByLog($login);

    if ($user) {
        echo "Пользователь уже существует!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } else if ($password !== $repeat_password) {
        echo "Пароли не совпадают!";
        ?>
        <br>
        <a href="/Logic/register.php">Back</a>
        <?php
    } else if (strlen($password) < 6) {
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
        $user->save();
        $_SESSION['login'] = $login;
        \Core\LoginUser::login($login);

        header('Location: /');
    }


} else { ?>
    <div class="container mregister">
        <div id="login">
            <h1>REGISTER</h1>
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
                    <label for="user_pass">Пароль<br/>
                        <input type="password" name="password" id="password" class="input" value="" size="32" min="6"/></label>
                </p>

                <p>
                    <label for="user_pass_repeat">Пароль<br/>
                        <input type="password" name="repeat_password" id="repeat_password" class="input" value=""
                               size="32" min="6"/></label>
                </p>


                <p class="submit">
                    <input type="submit" name="register" id="register" class="button" value="Register"/>
                </p>

                <p class="regtext">Уже есть аккаунт? <a href="login.php">Войти</a>!</p>
            </form>

        </div>
    </div>
<?php }