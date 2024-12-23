<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223142232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (id INT NOT NULL, nom VARCHAR(100) DEFAULT NULL, prenom VARCHAR(100) DEFAULT NULL, date_naissance DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT NOT NULL, nom VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, date_creation DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commerce (id INT NOT NULL, nom VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, siret VARCHAR(14) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupon (id INT AUTO_INCREMENT NOT NULL, acheteurs_id INT DEFAULT NULL, commerce_id INT DEFAULT NULL, association_id INT DEFAULT NULL, titre VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, code_postal VARCHAR(5) DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, conditions LONGTEXT DEFAULT NULL, date_creation DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', fin_validite DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', qr_code LONGTEXT DEFAULT NULL, INDEX IDX_64BF3F021C3356FB (acheteurs_id), INDEX IDX_64BF3F02B09114B7 (commerce_id), INDEX IDX_64BF3F02EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, dtype VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acheteur ADD CONSTRAINT FK_304AFF9DBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CCBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commerce ADD CONSTRAINT FK_BBF5FDF9BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F021C3356FB FOREIGN KEY (acheteurs_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur DROP FOREIGN KEY FK_304AFF9DBF396750');
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CCBF396750');
        $this->addSql('ALTER TABLE commerce DROP FOREIGN KEY FK_BBF5FDF9BF396750');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F021C3356FB');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F02B09114B7');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F02EFB9C8A5');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE commerce');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE user');
    }
}
