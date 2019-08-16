<?php

namespace Controllers;


use Core\Controller;
use Core\LoginUser;
use Model\Article;
use Model\User;
use Model\Comment;

class Index extends Controller
{
    public function actionDefault()
    {
        $this->view->user = LoginUser::check();
        $this->view->articles = Article::findAll();
        $this->view->display('index.html');
    }

    public function actionAdd()
    {
        $this->view->user = LoginUser::check();
        $this->view->display('add.html');
    }


    public function actionEnter()
    {
        $this->view->user = LoginUser::check();

        if ($this->view->user != null) {
            $this->actionDefault();
        } else {
            $this->view->display('enter.html');
        }

    }

    public function actionPage($id)
    {
        $this->view->user = LoginUser::check();
        $this->view->article = Article::findById($id);
        $this->view->comments = Comment::findComments($id);
        $this->view->display('page.html');
    }

    public function actionLogout()
    {
        LoginUser::logout();
        header('Location: /');
        exit;
    }
}