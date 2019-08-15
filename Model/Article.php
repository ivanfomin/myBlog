<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 26.11.16
 * Time: 19:07
 */

namespace Model;


use Core\Model;

class Article extends Model
{
    public static $table = 'articles';
    public $title;
    public $content;
    public $user_id;
    public $date;

    public function __get($name)
    {
        if ($name == 'user') {
            $name = User::findById($this->user_id)->name;
            if (false == $name) {
                $name = 'Не известен.';
            }
            return $name;
        }
    }

    public function __set($name, $user_id)
    {
        if($name == 'user') {
            $this->user_id = $user_id;
        }
    }

    public function __isset($name)
    {
        if ($name == 'user' && !empty($this->user_id)) {
            return true;
        } else {
            return false;
        }
    }
}