<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031112912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE apprenant (id INT AUTO_INCREMENT NOT NULL, referentiel_id INT NOT NULL, telephone VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, datenaiss DATETIME NOT NULL, lieunaiss VARCHAR(255) NOT NULL, sex VARCHAR(10) NOT NULL, INDEX IDX_C4EB462E805DB139 (referentiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE apprenant');
    }
}
