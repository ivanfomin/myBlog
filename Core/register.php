<?php

session_start();


require_once __DIR__ . '/../autoloads.php';

use Model\User;

if (!empty($_POST['login']) && !empty($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $user = User::findByLog($login);
    if (!$user) {
        $user = new User();
        $user->login = $login;
        $user->password = $password;
        $user->id_role = 1;
        $user->save();
        $message = "Account Successfully Created";
    } else {
        $message = "That username already exists! Please try another one!";

    }
    if (!empty($message)) {
        echo "MESSAGE: " . $message;
        ?>
        <a href="/">Back</a><br>
        <?php
    }

} else { ?>
    <div class="container mregister">
        <div id="login">
            <h1>REGISTER</h1>
            <form name="registerform" id="registerform" action="register.php" method="post">

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