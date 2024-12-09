<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241209095927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon ADD acheteur_id INT DEFAULT NULL, ADD commerce_id INT DEFAULT NULL, ADD association_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F0296A7BB5F FOREIGN KEY (acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02B09114B7 FOREIGN KEY (commerce_id) REFERENCES commerce (id)');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F02EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('CREATE INDEX IDX_64BF3F0296A7BB5F ON coupon (acheteur_id)');
        $this->addSql('CREATE INDEX IDX_64BF3F02B09114B7 ON coupon (commerce_id)');
        $this->addSql('CREATE INDEX IDX_64BF3F02EFB9C8A5 ON coupon (association_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F0296A7BB5F');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F02B09114B7');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F02EFB9C8A5');
        $this->addSql('DROP INDEX IDX_64BF3F0296A7BB5F ON coupon');
        $this->addSql('DROP INDEX IDX_64BF3F02B09114B7 ON coupon');
        $this->addSql('DROP INDEX IDX_64BF3F02EFB9C8A5 ON coupon');
        $this->addSql('ALTER TABLE coupon DROP acheteur_id, DROP commerce_id, DROP association_id');
    }
}
