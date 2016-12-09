<?php





function isUser()
{
    return isset($_COOKIE['auth']);
}

function getUser()
{
    return $_COOKIE['auth'];
}

if(!isUser()) {
    header('Location: /form.html');
    exit;
}