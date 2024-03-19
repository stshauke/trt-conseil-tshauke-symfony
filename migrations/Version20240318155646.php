<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240318155646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil_recruteur ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE profil_recruteur ADD CONSTRAINT FK_83A851ACFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_83A851ACFB88E14F ON profil_recruteur (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil_recruteur DROP FOREIGN KEY FK_83A851ACFB88E14F');
        $this->addSql('DROP INDEX IDX_83A851ACFB88E14F ON profil_recruteur');
        $this->addSql('ALTER TABLE profil_recruteur DROP utilisateur_id');
    }
}
