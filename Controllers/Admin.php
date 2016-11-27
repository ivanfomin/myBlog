<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 26.11.16
 * Time: 19:31
 */

namespace Controllers;


use Core\Controller;
use Model\Article;


class Admin extends Controller
{
    public function actionDefault()
    {
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
        $this->actionDefault();
    }

    public function actionAdd()
    {
        $this->view->display('add.html');
    }

}