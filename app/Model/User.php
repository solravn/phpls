<?php

namespace App\Model;

use App\Core\BaseModel;

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

