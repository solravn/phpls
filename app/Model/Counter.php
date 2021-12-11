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

    public function getCurrentCount()
    {

    }
}