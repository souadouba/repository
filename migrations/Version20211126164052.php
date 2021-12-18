<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211126164052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD nom VARCHAR(100) NOT NULL, ADD num_imarticul VARCHAR(255) NOT NULL, ADD pays_imarticul VARCHAR(255) NOT NULL, ADD nom_societe VARCHAR(100) NOT NULL, ADD num_contrat VARCHAR(255) NOT NULL, ADD nom_agence VARCHAR(100) NOT NULL, ADD addresse_agence VARCHAR(255) NOT NULL, ADD email_agence VARCHAR(25) NOT NULL, ADD nom_conduct VARCHAR(25) NOT NULL, ADD prenom_conduct VARCHAR(25) NOT NULL, ADD date_nais_conduct DATE NOT NULL, ADD addres_conduct VARCHAR(50) NOT NULL, ADD tel_email VARCHAR(255) NOT NULL, ADD num_permis VARCHAR(255) NOT NULL, ADD validite_permis VARCHAR(255) NOT NULL, ADD valid_permis DATE NOT NULL, ADD mes_observ LONGTEXT NOT NULL, ADD nom_temoins VARCHAR(100) NOT NULL, ADD adres_temoin VARCHAR(100) NOT NULL, ADD tel_email_temoin VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP nom, DROP num_imarticul, DROP pays_imarticul, DROP nom_societe, DROP num_contrat, DROP nom_agence, DROP addresse_agence, DROP email_agence, DROP nom_conduct, DROP prenom_conduct, DROP date_nais_conduct, DROP addres_conduct, DROP tel_email, DROP num_permis, DROP validite_permis, DROP valid_permis, DROP mes_observ, DROP nom_temoins, DROP adres_temoin, DROP tel_email_temoin');
    }
}
