<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121220822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_categories DROP FOREIGN KEY FK_198B4FA9D5E258C5');
        $this->addSql('DROP INDEX IDX_198B4FA9D5E258C5 ON post_categories');
        $this->addSql('ALTER TABLE post_categories DROP posts_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_categories ADD posts_id INT NOT NULL');
        $this->addSql('ALTER TABLE post_categories ADD CONSTRAINT FK_198B4FA9D5E258C5 FOREIGN KEY (posts_id) REFERENCES posts (id)');
        $this->addSql('CREATE INDEX IDX_198B4FA9D5E258C5 ON post_categories (posts_id)');
    }
}
