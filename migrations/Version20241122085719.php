<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122085719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emploi ADD classe_id INT NOT NULL, ADD salle VARCHAR(255) NOT NULL, ADD jour VARCHAR(10) NOT NULL, ADD nom_enseignant VARCHAR(255) NOT NULL, DROP isrecurring, CHANGE start_time start_time TIME NOT NULL, CHANGE end_time end_time TIME NOT NULL');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FA8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_74A0B0FA8F5EA509 ON emploi (classe_id)');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\', DROP role');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emploi DROP FOREIGN KEY FK_74A0B0FA8F5EA509');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP INDEX IDX_74A0B0FA8F5EA509 ON emploi');
        $this->addSql('ALTER TABLE emploi ADD isrecurring TINYINT(1) NOT NULL, DROP classe_id, DROP salle, DROP jour, DROP nom_enseignant, CHANGE start_time start_time DATETIME NOT NULL, CHANGE end_time end_time DATETIME NOT NULL');
        $this->addSql('ALTER TABLE `user` ADD role VARCHAR(255) NOT NULL, DROP roles');
    }
}
