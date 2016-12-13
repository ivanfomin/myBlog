<?php


setcookie("login", "lamer", time() + 3600 * 24 * 7);
setcookie("password", "qwerty", time() + 3600 * 24 * 7);

var_dump($_COOKIE);