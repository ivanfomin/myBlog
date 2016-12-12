<?php
require_once __DIR__ . '/../autoloads.php';



\Core\LoginUser::logout();
header('Location: ' . $_SERVER['HTTP_REFERER']);

