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
        $conn  = static::getPdo();
        $table = static::tableName();

        $statement = $conn->prepare("SELECT * FROM $table WHERE name = :counterName");
        $statement->execute(['counterName' => $counterName]);

        return $statement->fetch();
    }

    public static function increaseCounter($counterName): bool
    {
        $conn  = static::getPdo();
        $table = static::tableName();
        $counterName = urldecode($counterName);

        $statement = $conn->prepare("INSERT INTO $table VALUES (:counterName,1) ON CONFLICT (name) DO UPDATE SET value = $table.value + 1");

        return $statement->execute(['counterName' => $counterName]);
    }
}