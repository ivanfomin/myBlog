<?php

session_start();


require_once __DIR__ . '/../autoloads.php';

use Model\User;

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['name'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars($_POST['name']);

    $user = User::findByLog($login);
    if (!$user) {
        $user = new User();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->name = $name;
        $user->id_role = 1;
        $user->save();
        $message = "Account Successfully Created";
    } else {
        $message = "That username already exists! Please try another one!";

    }
    if (!empty($message)) {
        echo "MESSAGE: " . $message;
        ?>
        <br>
        <a href="/">Back</a>
        <?php
    }

} else { ?>
    <div class="container mregister">
        <div id="login">
            <h1>REGISTER</h1>
            <form name="registerform" id="registerform" action="register.php" method="post">
                <p>
                    <label for="user_login">Full Name<br/>
                        <input type="text" name="name" id="name" class="input" size="32" value=""/></label>
                </p>
                <p>
                    <label for="login">Username<br/>
                        <input type="text" name="login" id="login" class="input" value="" size="20"/></label>
                </p>

                <p>
                    <label for="user_pass">Password<br/>
                        <input type="password" name="password" id="password" class="input" value="" size="32"/></label>
                </p>


                <p class="submit">
                    <input type="submit" name="register" id="register" class="button" value="Register"/>
                </p>

                <p class="regtext">Already have an account? <a href="login.php">Login Here</a>!</p>
            </form>

        </div>
    </div>
<?php }