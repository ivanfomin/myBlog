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


    public function actionEnter($message)
    {
        $this->view->user = LoginUser::check();

        if ($this->view->user != null) {
            $this->actionDefault();
        } else {
            $this->view->message = urldecode($message);
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

    public function actionSend()
    {
        $this->view->user = LoginUser::check();
        if ($this->view->user == false) {
            $this->view->message = 'Необходимо зарегестрироваться!';
            $this->view->display('index.html');
        } else {
            $this->view->display('send.html');
        }
    }

    public function actionConfirm($token)
    {
        $user = User::findByToken($token);
        if ($user != false) {
            $user->active = 1;
            $user->save();
        }

        header('Location: /');
        exit;
    }

    public function actionRestore($id)
    {
        $this->view->user = User::findById($id);
        $this->view->display("restore.html");
    }


}