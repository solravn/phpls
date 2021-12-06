<?php

require_once APP_DIR . '/core/BaseModel.php';

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

