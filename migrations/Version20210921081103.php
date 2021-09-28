<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921081103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, nom_id INT DEFAULT NULL, INDEX IDX_51C88FADC8121CE9 (nom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prestation VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation_prestation (type_prestation_id INT NOT NULL, prestation_id INT NOT NULL, INDEX IDX_FE004CBAEEA87261 (type_prestation_id), INDEX IDX_FE004CBA9E45C554 (prestation_id), PRIMARY KEY(type_prestation_id, prestation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADC8121CE9 FOREIGN KEY (nom_id) REFERENCES visite (id)');
        $this->addSql('ALTER TABLE type_prestation_prestation ADD CONSTRAINT FK_FE004CBAEEA87261 FOREIGN KEY (type_prestation_id) REFERENCES type_prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_prestation_prestation ADD CONSTRAINT FK_FE004CBA9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_prestation_prestation DROP FOREIGN KEY FK_FE004CBA9E45C554');
        $this->addSql('ALTER TABLE type_prestation_prestation DROP FOREIGN KEY FK_FE004CBAEEA87261');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADC8121CE9');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE type_prestation_prestation');
        $this->addSql('DROP TABLE visite');
    }
}
