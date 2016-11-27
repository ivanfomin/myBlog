<?php

namespace Controllers;


use Core\Controller;
use Model\Article;

class Index extends Controller
{
    public function actionDefault()
    {
        $this->view->articles = Article::findAll();
        $this->view->display('index.html');
    }
}