<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106160833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer CHANGE legal_status legal_status VARCHAR(255) DEFAULT NULL, CHANGE number_employees number_employees VARCHAR(15) DEFAULT NULL, CHANGE locality_society locality_society VARCHAR(50) DEFAULT NULL, CHANGE society society VARCHAR(70) DEFAULT NULL, CHANGE position position VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer CHANGE legal_status legal_status VARCHAR(255) NOT NULL, CHANGE number_employees number_employees INT NOT NULL, CHANGE locality_society locality_society VARCHAR(50) NOT NULL, CHANGE society society VARCHAR(70) NOT NULL, CHANGE position position VARCHAR(255) NOT NULL');
    }
}
