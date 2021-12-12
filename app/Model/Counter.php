<?php

namespace App\Model;

use App\Core\BaseModel;


class Counter extends BaseModel
{
    public $name;
    public $value;

    public static function tableName(): string
    {
        return 'tbl_counter';
    }

    public static function findByName($counterName)
    {
        $conn  = BaseModel::getPdo();
        $table = Counter::tableName();

        $statement = $conn->prepare("SELECT * FROM $table WHERE name = :counterName");
        $statement->execute(['counterName' => $counterName]);

        return $statement->fetch();
    }

    public static function increaseCounter($counterName)
    {
        $conn = BaseModel::getPdo();
        $table = Counter::tableName();
        $counterName = urldecode($counterName);

        if(!empty(static::findByName($counterName))) {
            $statement = $conn->prepare("UPDATE $table SET value = value + 1 WHERE name = :counterName");
        } else {
            $statement = $conn->prepare("INSERT INTO $table VALUES (:counterName,1)");
        }

        $statement->execute(['counterName' => $counterName]);
        return $statement->fetch();
    }
}