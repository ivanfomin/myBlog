<?php

namespace Model;

use Core\Model;
use Core\Db;

class Comment extends Model
{
    public static $table = 'comments';
    public $article_id;
    public $user_login;
    public $content;
    public $date;

    public static function findComments($article_id)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE article_id=:article_id ORDER BY date DESC';

        $data = $db->query($sql, [':article_id' => $article_id], static::class);
        return $data;
    }

}