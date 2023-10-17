<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013104144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF3363BD430E');
        $this->addSql('DROP INDEX IDX_B723AF3363BD430E ON student');
        $this->addSql('ALTER TABLE student CHANGE n_id classroom INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33497D309D FOREIGN KEY (classroom) REFERENCES classroom (ref)');
        $this->addSql('CREATE INDEX IDX_B723AF33497D309D ON student (classroom)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33497D309D');
        $this->addSql('DROP INDEX IDX_B723AF33497D309D ON student');
        $this->addSql('ALTER TABLE student CHANGE classroom n_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF3363BD430E FOREIGN KEY (n_id) REFERENCES classroom (ref)');
        $this->addSql('CREATE INDEX IDX_B723AF3363BD430E ON student (n_id)');
    }
}
