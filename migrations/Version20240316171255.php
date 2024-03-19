<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240316171255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD profil_recruteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5CD8E2678 FOREIGN KEY (profil_recruteur_id) REFERENCES profil_recruteur (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5CD8E2678 ON annonce (profil_recruteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5CD8E2678');
        $this->addSql('DROP INDEX IDX_F65593E5CD8E2678 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP profil_recruteur_id');
    }
}
