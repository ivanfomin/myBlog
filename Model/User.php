<?php
/**
 * Created by PhpStorm.
 * User: ioan
 * Date: 10.12.16
 * Time: 19:25
 */

namespace Model;


use Core\Model;

class User extends Model
{
    public static $table = 'users';
    public $login;
    public $password;
    public $id_role;

}