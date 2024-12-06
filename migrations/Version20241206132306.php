<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241206132306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, date_creation DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commerce (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupon (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, conditions LONGTEXT DEFAULT NULL, date_creation DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', fin_validite DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', qr_code LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE commerce');
        $this->addSql('DROP TABLE coupon');
    }
}
