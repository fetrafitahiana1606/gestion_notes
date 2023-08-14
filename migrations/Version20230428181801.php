<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428181801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit_etudiant (id INT AUTO_INCREMENT NOT NULL, type_action VARCHAR(14) NOT NULL, update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', num_etudiant VARCHAR(64) NOT NULL, nom VARCHAR(64) NOT NULL, moyenne_ancienne NUMERIC(4, 2) NOT NULL, moyenne_nouvelle NUMERIC(4, 2) NOT NULL, user VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audit_matiere (id INT AUTO_INCREMENT NOT NULL, type_action VARCHAR(64) NOT NULL, update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', num_matiere VARCHAR(8) NOT NULL, design VARCHAR(32) NOT NULL, coef_ancien INT NOT NULL, coef_nouveau INT NOT NULL, user VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audit_note (id INT AUTO_INCREMENT NOT NULL, type_operation VARCHAR(12) NOT NULL, num_etudiant INT NOT NULL, note_ancienne NUMERIC(4, 2) NOT NULL, note_nouvelle NUMERIC(4, 2) NOT NULL, user VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, num_etudiant INT NOT NULL, nom VARCHAR(64) NOT NULL, moyenne NUMERIC(4, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_717E22E3A86D7B25 (num_etudiant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, num_matiere VARCHAR(8) NOT NULL, design VARCHAR(25) NOT NULL, coef INT NOT NULL, UNIQUE INDEX UNIQ_9014574A55174DA3 (num_matiere), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, matiere_id INT NOT NULL, note NUMERIC(4, 2) NOT NULL, INDEX IDX_CFBDFA14DDEAB1A3 (etudiant_id), INDEX IDX_CFBDFA14F46CD258 (matiere_id), UNIQUE INDEX UNIQ_CFBDFA14DDEAB1A3F46CD258 (etudiant_id, matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14DDEAB1A3');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F46CD258');
        $this->addSql('DROP TABLE audit_etudiant');
        $this->addSql('DROP TABLE audit_matiere');
        $this->addSql('DROP TABLE audit_note');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE user');
    }
}
