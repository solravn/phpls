<?php

use App\Core\BaseModel;

class Order extends BaseModel
{
    public $id;
    public $platform;
    public $cost;

    public static function tableName(): string
    {
        return 'tbl_order';
    }
}

