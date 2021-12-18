<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211203035053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD circontance_4 VARCHAR(255) DEFAULT NULL, ADD circontance_5 VARCHAR(255) DEFAULT NULL, ADD circontance_6 VARCHAR(255) DEFAULT NULL, ADD circontance_7 VARCHAR(255) DEFAULT NULL, ADD circontance_8 VARCHAR(255) DEFAULT NULL, ADD circontance_9 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP circontance_4, DROP circontance_5, DROP circontance_6, DROP circontance_7, DROP circontance_8, DROP circontance_9');
    }
}
