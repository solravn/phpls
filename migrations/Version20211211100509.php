<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211211100509 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
            CREATE TABLE public.tbl_counter (
                name TEXT NOT NULL PRIMARY KEY,
                value INT NOT NULL
            )
            SQL
        );
    }

    public function down(Schema $schema): void
    {

    }
}
