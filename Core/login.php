<?php

if(empty($_POST['login']) || empty($_POST['password'])) {
    header('Location: /form.html');
    exit;
}