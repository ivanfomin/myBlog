<?php


session_start();


require_once __DIR__ . '/../autoload.php';

use Model\User;
use Core\ConfirmUser;

if (!empty($_POST['email'])) {

    $email = htmlspecialchars($_POST['email']);

    $find_email = User::findByEmail($email);


    if ($find_email) {
        $confirmUser = new ConfirmUser($find_email);
        $confirmUser->restore();
    }

    header('Location: /');


} else { ?>
    <div class="container mregister">
        <div id="login">
            <h1>Восстановить</h1>
            <form name="registerform" id="registerform" action="restore.php" method="post">

                <p>
                    <label for="email">Почтовый ящик<br/>
                        <input type="email" name="email" id="email" class="input"/></label>
                </p>


                <button type="submit">Отправить</button>

            </form>

        </div>
    </div>
<?php }