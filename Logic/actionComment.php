<?php

require_once __DIR__ . '/../autoload.php';
$content = htmlspecialchars($_POST['content']);


$comment = new \Model\Comment();
$comment->content = $content;
$comment->article_id = $_POST['article_id'];
$comment->user_login = $_POST['user_login'];
$comment->save();
header('Location: ' . $_SERVER['HTTP_REFERER']);