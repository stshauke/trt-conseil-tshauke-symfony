<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240330090052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP poste_demandee, CHANGE description_annonce description_annonce VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY candidature_ibfk_1');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B88805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE candidature RENAME INDEX annonce_id TO IDX_E33BD3B88805AB2F');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD poste_demandee VARCHAR(255) DEFAULT NULL, CHANGE description_annonce description_annonce LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B88805AB2F');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT candidature_ibfk_1 FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidature RENAME INDEX idx_e33bd3b88805ab2f TO annonce_id');
    }
}
