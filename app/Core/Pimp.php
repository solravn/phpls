<?php

namespace App\Core;

class Pimp
{
    protected static $app;

    public Settings $settings;
    public DbConnection $db;

    private function __construct()
    {
    }

    public static function app()
    {
        if (empty(self::$app))
        {
            self::$app = new self();
        }

        return self::$app;
    }

    public function run(Settings $settings)
    {
        $this->settings = $settings;

        $dbConfig = $settings->get('database');
        $this->db = new DbConnection($dbConfig);

        session_start();

        Router::invoke();
    }
}
