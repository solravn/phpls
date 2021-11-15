<?php

class User
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

    public function sayHello()
    {
        echo 'hi, i\'m ' . $this->name . ', ' . $this->age . ' y.o.' ;
    }

    public function getEmail()
    {

    }
}
