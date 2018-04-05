<?php

namespace myforum\core\base;


class Model
{
    public static $table;
    public $id;
    const LIMMIT = 1;

    public static function findAll()
    {
        $db = Db::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }

    public static function findByid($id)
    {
        $db = Db::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id],
            static::class
        );
        return $data[0] ?? false;
    }

    public function save ()
    {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function insert()
    {
        $columns = [];
        $binds = [];
        $data = [];
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $columns[] = $column;
            $binds[] = ':' . $column;
            $data[':' . $column] = $value;
        }
        $sql = '
                INSERT INTO ' . static::$table . '
                (' . implode(', ', $columns). ')
                VALUES
                (' . implode(', ', $binds). ')
                ';
        $db = Db::getInstance();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function update()
    {
        $columns = [];
        $data = [];
        foreach ($this as $item => $value) {
            if ('id' == $item) {
                continue;
            }
            $columns[] = $item . ' = ' . ':' . $item;
            $data[':' . $item] = $value;
        }
        $sql = '
                UPDATE ' . static::$table . '
                SET ' . implode(',', $columns) .
            ' WHERE id = :id';
        $data[':id'] = $this->id;
        $db = Db::getInstance();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $sql = '
            DELETE FROM ' . static::$table . '
            WHERE id=:id';
        $data[':id'] = $this->id;
        $db = Db::getInstance();
        $db->execute($sql, $data);
    }

    public static function getTotal()
    {
        $db = Db::getInstance();
        $data = $db->query(
            'SELECT COUNT(id) AS count FROM ' . static::$table,
            [],
            static::class
        );
        return $data[0];

    }

    public static function getOffset($page=1)
    {
        $offset = ($page -1)*self::LIMMIT;

        $db = DB::getInstance();
        $data = $db->query(
            'SELECT * FROM ' . static::$table . ' LIMIT '.self::LIMMIT . ' OFFSET ' . $offset,
            [],
            static::class
        );
        return $data;
    }


}