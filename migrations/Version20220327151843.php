<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327151843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weighting (id INT AUTO_INCREMENT NOT NULL, registered_at DATETIME NOT NULL, weight DOUBLE PRECISION NOT NULL, waist_circumference SMALLINT DEFAULT NULL, hips_circumference SMALLINT DEFAULT NULL, chest_circumference SMALLINT DEFAULT NULL, arm_circumference SMALLINT DEFAULT NULL, thigh_circumference SMALLINT DEFAULT NULL, is_milestone TINYINT(1) NOT NULL, is_initial_date TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE weighing');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weighing (id INT AUTO_INCREMENT NOT NULL, registered_at DATETIME NOT NULL, weight DOUBLE PRECISION NOT NULL, waist_circumference SMALLINT DEFAULT NULL, hips_circumference SMALLINT DEFAULT NULL, chest_circumference SMALLINT DEFAULT NULL, arm_circumference SMALLINT DEFAULT NULL, thigh_circumference SMALLINT DEFAULT NULL, is_milestone TINYINT(1) NOT NULL, is_initial_date TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE weighting');
    }
}
