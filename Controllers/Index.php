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
}