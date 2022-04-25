<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425183425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stocks (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, symbol VARCHAR(255) NOT NULL, short_name VARCHAR(255) NOT NULL, currency VARCHAR(255) NOT NULL, exchange_name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, previous_close DOUBLE PRECISION NOT NULL, price_change DOUBLE PRECISION NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE stocks');
    }
}
