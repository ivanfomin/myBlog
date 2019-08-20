<?php

namespace Core;

use Model\User;

class ConfirmUser
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function sendConfirm()
    {
        $rand = rand();
        $this->user->token = $rand;
        $this->user->save();

        $to = "<" . $this->user->email .">";

        $subject = 'Подтверждение';

        $message = '<p> Перейдите по ссылке </p> <a href="https://myblog.pingin.ru/Index/Confirm/' . $rand . '">Подтвердить</a>  </br>';

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: cn17628@pingin.ru \r\n";
        $headers .= "Reply-To: cn17628@pingin.ru \r\n";

        mail($to, $subject, $message, $headers);

    }

    public function restore()
    {

        $to = "<" . $this->user->email .">";

        $subject = 'Восстановление';

        $message = '<p> Перейдите по ссылке </p> <a href="https://myblog.pingin.ru/Index/Restore/' . $this->user->id .'">Перейти</a></p></br>';

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: cn17628@pingin.ru \r\n";
        $headers .= "Reply-To: cn17628@pingin.ru \r\n";

        mail($to, $subject, $message, $headers);
    }

}