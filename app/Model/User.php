<?php

require_once APP_DIR . '/core/BaseModel.php';

class User extends BaseModel
{
    public $id;
    public $email;

    public static function tableName(): string
    {
        return 'tbl_user';
    }

    public function fullName()
    {
        return '#' . $this->id . ' ' . $this->email;
    }
}

