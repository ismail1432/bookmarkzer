<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312224954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookmark (
          id INT AUTO_INCREMENT NOT NULL,
          uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\',
          title VARCHAR(255) NOT NULL,
          author VARCHAR(255) NOT NULL,
          created_at DATETIME NOT NULL,
          url TEXT NOT NULL,
          height INT NOT NULL,
          width INT NOT NULL,
          duration INT DEFAULT NULL,
          type VARCHAR(255) NOT NULL,
          tags TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\',
          UNIQUE INDEX UNIQ_DA62921DD17F50A6 (uuid),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bookmark');
    }
}
