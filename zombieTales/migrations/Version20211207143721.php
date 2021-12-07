<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207143721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addons ADD version_id INT NOT NULL');
        $this->addSql('ALTER TABLE addons ADD CONSTRAINT FK_DB6526374BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('CREATE INDEX IDX_DB6526374BBC2705 ON addons (version_id)');
        $this->addSql('ALTER TABLE comment ADD scenario_id INT DEFAULT NULL, ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CE04E49DF ON comment (scenario_id)');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
        $this->addSql('ALTER TABLE objectifs ADD scenario_id INT NOT NULL');
        $this->addSql('ALTER TABLE objectifs ADD CONSTRAINT FK_7805601E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_7805601E04E49DF ON objectifs (scenario_id)');
        $this->addSql('ALTER TABLE scenario ADD difficulty_id INT NOT NULL, ADD author_id INT NOT NULL, ADD version_id INT NOT NULL');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8FCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D84BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8FCFA9DAE ON scenario (difficulty_id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D8F675F31B ON scenario (author_id)');
        $this->addSql('CREATE INDEX IDX_3E45C8D84BBC2705 ON scenario (version_id)');
        $this->addSql('ALTER TABLE special_rules ADD scenario_id INT NOT NULL');
        $this->addSql('ALTER TABLE special_rules ADD CONSTRAINT FK_25A4377DE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_25A4377DE04E49DF ON special_rules (scenario_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE addons DROP FOREIGN KEY FK_DB6526374BBC2705');
        $this->addSql('DROP INDEX IDX_DB6526374BBC2705 ON addons');
        $this->addSql('ALTER TABLE addons DROP version_id');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE04E49DF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('DROP INDEX IDX_9474526CE04E49DF ON comment');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B ON comment');
        $this->addSql('ALTER TABLE comment DROP scenario_id, DROP author_id');
        $this->addSql('ALTER TABLE objectifs DROP FOREIGN KEY FK_7805601E04E49DF');
        $this->addSql('DROP INDEX IDX_7805601E04E49DF ON objectifs');
        $this->addSql('ALTER TABLE objectifs DROP scenario_id');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8FCFA9DAE');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8F675F31B');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D84BBC2705');
        $this->addSql('DROP INDEX IDX_3E45C8D8FCFA9DAE ON scenario');
        $this->addSql('DROP INDEX IDX_3E45C8D8F675F31B ON scenario');
        $this->addSql('DROP INDEX IDX_3E45C8D84BBC2705 ON scenario');
        $this->addSql('ALTER TABLE scenario DROP difficulty_id, DROP author_id, DROP version_id');
        $this->addSql('ALTER TABLE special_rules DROP FOREIGN KEY FK_25A4377DE04E49DF');
        $this->addSql('DROP INDEX IDX_25A4377DE04E49DF ON special_rules');
        $this->addSql('ALTER TABLE special_rules DROP scenario_id');
    }
}
