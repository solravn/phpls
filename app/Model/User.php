<?php

namespace App\Model;

use App\Core\BaseModel;
use App\Core\Pimp;

class User extends BaseModel
{
    public $id;
    public $email;
    public $password;

    public static function tableName(): string
    {
        return 'tbl_user';
    }

    public function fullName()
    {
        return '#' . $this->id . ' ' . $this->email;
    }

    public static function findByEmail($email)
    {
        $result = Pimp::app()->db->fetchOne(
            "SELECT * FROM tbl_user WHERE email = :email",
            ['email' => $email]
        );

        if ($result)
        {
            $user = new self();
            $user->setAttributes($result);
            return $user;
        }

        return null;
    }

    public static function registrationUser($email, $password)
    {
        $result = Pimp::app()->db->execute(
            "INSERT INTO tbl_user values (default, :email, CURRENT_TIMESTAMP, :password)",
            ['email'     => $email,
             'password' => $password]
        );

        if($result)
        {
            return $result;
        }

        return null;
    }
}

