<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 26.11.16
 * Time: 19:31
 */
namespace Controllers;

session_start();

use Core\Controller;
use Core\Login;
use Core\LoginUser;
use Model\Article;


class Admin extends Controller
{

    public function actionDefault()
    {
        $this->view->user = LoginUser::check();
        $this->view->articles = Article::findAll();
        $this->view->display('admin.html');
    }

    public function actionEdit($id)
    {
        $this->view->article = Article::findById($id);
        $this->view->display('edit.html');
    }

    public function actionDelete($id)
    {
        $this->view->article = Article::findById($id);
        $this->view->article->delete();
        header('Location: /Admin');
    }

    public function actionAdd()
    {
        $this->view->display('add.html');
    }

    public function actionAct()
    {

        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        if (isset($_POST['update'])) {
            $article = Article::findById($id);
            $article->title = $title;
            $article->content = $content;
            $article->save();
        } else if (isset($_POST['insert'])) {
            $article = new Article();
            $article->title = $title;
            $article->content = $content;
            $article->save();
        }

        header('Location: /Admin');
    }

    public function actionLogin()
    {
        if (empty($_POST['login']) || empty($_POST['password'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!\Core\LoginUser::checkLoginPassword($login, $password)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $_SESSION['login'] = $login;

        \Core\LoginUser::login($login);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


}