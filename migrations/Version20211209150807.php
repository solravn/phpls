<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211209150807 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
            CREATE TABLE public.tbl_user (
                id SERIAL NOT NULL PRIMARY KEY,
                email TEXT NOT NULL,
                created_at TIMESTAMP WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP
            )
            SQL
        );
    }

    public function down(Schema $schema): void
    {

    }
}
