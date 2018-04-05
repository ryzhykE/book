<?php

namespace app\models;

use myforum\core\base\Model;

class Post extends Model
{
    public static $table = 'post';

    public function __get($name)
    {
        switch($name) {
            case 'author':
                return  User::findByid($this->author_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($name)
    {
        switch($name) {
            case 'author':
                return true;
                break;
            default:
                return null;
        }
    }
}