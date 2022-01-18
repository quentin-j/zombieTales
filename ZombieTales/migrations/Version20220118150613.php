<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118150613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario ADD difficulty_id INT NOT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D82C205AF3 FOREIGN KEY (difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D82C205AF3 ON scenario (difficulty_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D82C205AF3');
        $this->addSql('DROP INDEX IDX_3E45C8D82C205AF3 ON scenario');
        $this->addSql('ALTER TABLE scenario DROP difficulty_id_id');
    }
}
