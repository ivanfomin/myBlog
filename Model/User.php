<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 10.12.16
 * Time: 19:25
 */

namespace Model;


use Core\Model;
use Core\Db;

class User extends Model
{
    public static $table = 'users';
    public $login;
    public $password;
    public $name;
    public $id_role;

    public static function findByLog($login)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE login=:login';
        $data = $db->query($sql, [':login' => $login], static::class);
        return $data[0] ?? false;
    }

}