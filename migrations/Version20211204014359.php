<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204014359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD circontance_1 VARCHAR(255) DEFAULT NULL, ADD circontance_11 VARCHAR(255) DEFAULT NULL, ADD circontance_12 VARCHAR(255) DEFAULT NULL, ADD circontance_13 VARCHAR(255) DEFAULT NULL, ADD circontance_15 VARCHAR(255) NOT NULL, ADD circontance_16 VARCHAR(255) NOT NULL, ADD circontance_17 VARCHAR(255) NOT NULL, CHANGE circontance circontance_14 VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD circontance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP circontance_1, DROP circontance_11, DROP circontance_12, DROP circontance_13, DROP circontance_14, DROP circontance_15, DROP circontance_16, DROP circontance_17');
    }
}
