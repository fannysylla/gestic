<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107124516 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX nomref ON referentiel');
        $this->addSql('ALTER TABLE apprenant ADD session_id INT NOT NULL, ADD login VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD statut VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('CREATE INDEX IDX_C4EB462E613FECDF ON apprenant (session_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462E613FECDF');
        $this->addSql('DROP INDEX IDX_C4EB462E613FECDF ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP session_id, DROP login, DROP password, DROP statut, DROP adresse');
        $this->addSql('CREATE UNIQUE INDEX nomref ON referentiel (nomref)');
    }
}
