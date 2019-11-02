<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191031123810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE refsession (id INT AUTO_INCREMENT NOT NULL, referentiel_id INT NOT NULL, session_id INT NOT NULL, effectiftotal INT NOT NULL, INDEX IDX_5C6E5AAE805DB139 (referentiel_id), INDEX IDX_5C6E5AAE613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, nomsess VARCHAR(255) NOT NULL, effectif INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE refsession ADD CONSTRAINT FK_5C6E5AAE805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id)');
        $this->addSql('ALTER TABLE refsession ADD CONSTRAINT FK_5C6E5AAE613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE apprenant ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4EB462EA76ED395 ON apprenant (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE refsession DROP FOREIGN KEY FK_5C6E5AAE613FECDF');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462EA76ED395');
        $this->addSql('DROP TABLE refsession');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_C4EB462EA76ED395 ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP user_id');
    }
}
