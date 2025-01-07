<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250107102952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE acheteur ADD CONSTRAINT FK_304AFF9DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_304AFF9DA76ED395 ON acheteur (user_id)');
        $this->addSql('ALTER TABLE association ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE association ADD CONSTRAINT FK_FD8521CCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD8521CCA76ED395 ON association (user_id)');
        $this->addSql('ALTER TABLE commerce ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE commerce ADD CONSTRAINT FK_BBF5FDF9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BBF5FDF9A76ED395 ON commerce (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur DROP FOREIGN KEY FK_304AFF9DA76ED395');
        $this->addSql('DROP INDEX UNIQ_304AFF9DA76ED395 ON acheteur');
        $this->addSql('ALTER TABLE acheteur DROP user_id');
        $this->addSql('ALTER TABLE association DROP FOREIGN KEY FK_FD8521CCA76ED395');
        $this->addSql('DROP INDEX UNIQ_FD8521CCA76ED395 ON association');
        $this->addSql('ALTER TABLE association DROP user_id');
        $this->addSql('ALTER TABLE commerce DROP FOREIGN KEY FK_BBF5FDF9A76ED395');
        $this->addSql('DROP INDEX UNIQ_BBF5FDF9A76ED395 ON commerce');
        $this->addSql('ALTER TABLE commerce DROP user_id');
    }
}
