<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921090625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, lesclients_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, kms VARCHAR(255) NOT NULL, INDEX IDX_C744045548724A9 (lesclients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, lesvilles_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C3A415E015 (lesvilles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045548724A9 FOREIGN KEY (lesclients_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C3A415E015 FOREIGN KEY (lesvilles_id) REFERENCES departement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C3A415E015');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045548724A9');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE ville');
    }
}
