<?php

require_once __DIR__ . '/../autoloads.php';

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_POST['user_id'];

if (isset($_POST['update'])) {
    $article = \Model\Article::findById($id);
    $article->title = $title;
    $article->content = $content;
    $article->save();
} else if (isset($_POST['insert'])) {
    $article = new Model\Article();
    $article->title = $title;
    $article->content = $content;
    $article->user_id = $user_id;
    $article->save();
}

header('Location: /');