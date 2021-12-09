<?php

return [
    'table_storage' => [
        'table_name' => 'migration_versions',
    ],

    'migrations_paths' => [
        'Migrations' => './migrations',
    ],

    'all_or_nothing' => true,
    'transactional' => true,
    'check_database_platform' => true,
    'organize_migrations' => 'none',
];
