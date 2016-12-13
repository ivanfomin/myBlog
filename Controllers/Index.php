<?php

namespace Controllers;


use Core\Controller;
use Core\LoginUser;
use Model\Article;

class Index extends Controller
{
    public function actionDefault()
    {
        $this->view->user = LoginUser::check();
        $this->view->articles = Article::findAll();
        $this->view->display('index.html');
    }

    public function actionPage($id)
    {
        $this->view->user = LoginUser::check();
        $this->view->article = Article::findById($id);
        $this->view->display('page.html');
    }

    public function actionLogout()
    {
        LoginUser::logout();
        header('Location: /');
        exit;
    }
}