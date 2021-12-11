<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211211101420 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<SQL
            COMMENT ON COLUMN public.tbl_counter.name IS 'Counter name';
            SQL
        );

        $this->addSql(
            <<<SQL
            COMMENT ON COLUMN public.tbl_counter.value IS 'Counter value';
            SQL
        );

        $this->addSql(
            <<<SQL
            COMMENT ON TABLE public.tbl_counter IS 'Counter table';
            SQL
        );
    }

    public function down(Schema $schema): void
    {

    }
}
