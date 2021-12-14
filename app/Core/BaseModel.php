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

    public static function findById($id)
    {
        $tableName = static::tableName();

        $result = Pimp::app()->db->fetchOne(
            "SELECT * FROM $tableName WHERE id = :id",
            ['id' => $id]
        );

        if (!empty($result))
        {
            $user = new static();
            $user->setAttributes($result);
            return $user;
        }

        return null;
    }
}


