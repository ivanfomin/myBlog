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
    public $id;
    public $title;
    public $content;
}