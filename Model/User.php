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
    public $role;
    public $email;
    public $active;
    public $token;

    public static function findByLog($login)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE login=:login';
        $data = $db->query($sql, [':login' => $login], static::class);
        return $data[0] ?? false;
    }

      public static function findByEmail($email)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE email=:email';
        $data = $db->query($sql, [':email' => $email], static::class);
        return $data[0] ?? false;
    }

    public static function findByToken($token)
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE token=:token' ;
        $data = $db->query($sql, [':token' => $token], static::class);
        return $data[0] ?? false;
    }

}