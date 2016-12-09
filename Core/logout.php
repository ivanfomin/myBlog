<?php

function logout()
{
    unset($_COOKIE['auth']);
    setcookie('auth','', time() - 1);
}

logout();
header('Location: /index.php');
exit;