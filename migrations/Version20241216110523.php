<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216110523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F0296A7BB5F');
        $this->addSql('DROP INDEX IDX_64BF3F0296A7BB5F ON coupon');
        $this->addSql('ALTER TABLE coupon CHANGE acheteur_id acheteurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F021C3356FB FOREIGN KEY (acheteurs_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE INDEX IDX_64BF3F021C3356FB ON coupon (acheteurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F021C3356FB');
        $this->addSql('DROP INDEX IDX_64BF3F021C3356FB ON coupon');
        $this->addSql('ALTER TABLE coupon CHANGE acheteurs_id acheteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F0296A7BB5F FOREIGN KEY (acheteur_id) REFERENCES acheteur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64BF3F0296A7BB5F ON coupon (acheteur_id)');
    }
}
