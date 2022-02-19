<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220219143910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__symfotweets AS SELECT id, text, postdate FROM symfotweets');
        $this->addSql('DROP TABLE symfotweets');
        $this->addSql('CREATE TABLE symfotweets (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, text CLOB NOT NULL, postdate DATETIME NOT NULL)');
        $this->addSql('INSERT INTO symfotweets (id, text, postdate) SELECT id, text, postdate FROM __temp__symfotweets');
        $this->addSql('DROP TABLE __temp__symfotweets');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__symfotweets AS SELECT id, text, postdate FROM symfotweets');
        $this->addSql('DROP TABLE symfotweets');
        $this->addSql('CREATE TABLE symfotweets (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, text VARCHAR(255) NOT NULL, postdate DATETIME NOT NULL)');
        $this->addSql('INSERT INTO symfotweets (id, text, postdate) SELECT id, text, postdate FROM __temp__symfotweets');
        $this->addSql('DROP TABLE __temp__symfotweets');
    }
}
