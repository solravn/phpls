<?php

namespace App\Core;

use PDO;

abstract class BaseModel
{
    abstract public static function tableName(): string;

    public function setAttributes(array $attributes)
    {
        foreach ($attributes as $key => $value)
        {
            if (property_exists($this, $key))
            {
                $this->{$key} = $value;
            }
        }
    }

    public static function getPdo()
    {
        return new PDO('pgsql:dbname=dev;host=postgres', 'dev', '123');
    }

    public static function findById($id)
    {
        $conn = static::getPdo();

        $tableName = static::tableName();

        $statement = $conn->prepare("SELECT * FROM $tableName WHERE id = :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (!empty($result))
        {
            $user = new static();
            $user->setAttributes($result);
            return $user;
        }

        return null;
    }
}


