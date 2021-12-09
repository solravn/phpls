<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;

require 'vendor/autoload.php';

$dbParams = [
    'host'     => 'postgres',
    'dbname'   => 'dev',
    'user'     => 'dev',
    'password' => '123',
    'driver'   => 'pdo_pgsql',
];

$config     = new PhpFile(__DIR__ . '/migrations.php');
$connection = DriverManager::getConnection($dbParams);

return DependencyFactory::fromConnection($config, new ExistingConnection($connection));
