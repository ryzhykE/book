<?php

namespace myforum\core\base;

use myforum\core\App;
use myforum\core\Registry;
use myforum\core\Tsingleton;

class Db
{
    use Tsingleton;

    protected $dbh;

    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=' . App::$app->getProperty('host') .
                ';dbname=' . App::$app->getProperty('dbname'),
                App::$app->getProperty('user'),
                App::$app->getProperty('password'));
        if(!$this->dbh)
        {
            throw new \Exception("No connect with db", 500);
        }
    }

    public function execute(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            throw new \Exception("Request failed", 500);
            die;
        }
        return true;
    }

    public function query(string $sql, array $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($data);
        if (false === $result) {
            throw new \Exception("Request failed", 500);
            die;
        }
        if (null === $class) {
            return $sth->fetchAll();
        } else {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}