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
        $counterName = urldecode($counterName);
        $conn  = BaseModel::getPdo();
        $table = Counter::tableName();

        $statement = $conn->prepare("SELECT * FROM $table WHERE name = :counterName");
        $statement->execute(['counterName' => $counterName]);
        $result    = $statement->fetch();

        return $result;
    }
}