<?php

namespace App\Core;

class Settings
{
    protected $config = [];

    public function __construct(array $input)
    {
        $this->config = $input;
    }

    public function get($key)
    {
        return $this->config[$key] ?? null;
    }
}
