<?php

namespace app\models;


use myforum\core\base\Db;
use myforum\core\base\Model;

class User extends Model
{
    public static $table = 'users';

    /**
     * isset login in db
     * @param $login
     * @return bool
     */
    public static function findUser($login)
    {
        $db = Db::getInstance();
        $data = $db->query(
            'SELECT COUNT(id) AS count FROM ' . static::$table . ' WHERE login=:login',
            [':login' => $login],
            static::class
        );
        return $data[0] ?? false;
    }

    /**
     * return check user
     * @param $login
     * @return bool
     */
    public static function findUserAuth($login)
    {
        $db = Db::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE login=:login LIMIT 1',
            [':login' => $login],
            static::class
        );
        return $data[0] ?? false;
    }

    /**
     * add hash in db
     * @param $hash
     * @param $id
     * @return bool
     */
    public static function addHash($hash,$id)
    {
        $sql = "UPDATE  users  SET hash='$hash'  WHERE id='$id' ";
        $db = DB::getInstance();
        $result = $db->execute($sql);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }




}
