<?php

namespace myforum\core;


class Validator
{

    public static function validName($name)
    {
        if(!preg_match('/^(\w+){3,32}$/', $name))
        {
            return false;
        }
        return true;
    }

    public static function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        return false;
    }

    public static function validPassword($pass)
    {
        if (strlen($pass) > 20 || strlen($pass) < 8)
        {
            return false;
        }
        if(!preg_match("/^[a-z0-9]+$/i", $pass))
        {
            return false;
        }
        return true;
    }

    public static function validDescript($text)
    {
        if(mb_strlen(htmlspecialchars($text)) < 250 && mb_strlen(htmlspecialchars($text)) > 5)
        {
            return true;
        }
        return false;
    }

    public static function validText($text)
    {
        if( mb_strlen(htmlspecialchars($text)) > 3)
        {
            ;
            return true;
        }
        return false;
    }

    public static function generateCode($length=6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }

}