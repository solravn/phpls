<?php

namespace App\Core;

use PDO;

class DbConnection
{
    protected PDO $pdo;

    public function __construct(array $dbConfig)
    {
        $host   = $dbConfig['host'] ?? null;
        $dbName = $dbConfig['dbname'] ?? null;
        $user   = $dbConfig['user'] ?? null;
        $pass   = $dbConfig['password'] ?? null;

        if (empty($host) || empty($dbName) || empty($user))
        {
            // security
            unset($dbConfig['password']);
            throw new \Exception('Invalid db config: ' . json_encode($dbConfig));
        }

        $this->pdo = new PDO("pgsql:dbname=$dbName;host=$host", $user, $pass);
    }

    public function fetchOne($sql, array $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetch();
    }

    // todo more methods

    /**
     * Возвращает все найденные строки
     */
    public function fetchAll($sql, array $params = [])
    {
    }

    /**
     * Исполняет запрос (UPDATE/INSERT)
     */
    public function execute($sql, array $params = [])
    {
    }
}
