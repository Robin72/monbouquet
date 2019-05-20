<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190520084352 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bouquet (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_878E1707FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bouquet_fleur (id INT AUTO_INCREMENT NOT NULL, fleur_id INT NOT NULL, bouquet_id INT NOT NULL, nb_fleur INT NOT NULL, INDEX IDX_AFFEF298E8DD5A7 (fleur_id), INDEX IDX_AFFEF2986C8DF983 (bouquet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, mois INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, prix NUMERIC(4, 2) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur_saison (fleur_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_21743940E8DD5A7 (fleur_id), INDEX IDX_21743940F965414C (saison_id), PRIMARY KEY(fleur_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur_evenement (fleur_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_BD74591CE8DD5A7 (fleur_id), INDEX IDX_BD74591CFD02F13 (evenement_id), PRIMARY KEY(fleur_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleur_couleur (fleur_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_4EEB448CE8DD5A7 (fleur_id), INDEX IDX_4EEB448CC31BA576 (couleur_id), PRIMARY KEY(fleur_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, mois_debut INT NOT NULL, mois_fin INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bouquet ADD CONSTRAINT FK_878E1707FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE bouquet_fleur ADD CONSTRAINT FK_AFFEF298E8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id)');
        $this->addSql('ALTER TABLE bouquet_fleur ADD CONSTRAINT FK_AFFEF2986C8DF983 FOREIGN KEY (bouquet_id) REFERENCES bouquet (id)');
        $this->addSql('ALTER TABLE fleur_saison ADD CONSTRAINT FK_21743940E8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_saison ADD CONSTRAINT FK_21743940F965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_evenement ADD CONSTRAINT FK_BD74591CE8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_evenement ADD CONSTRAINT FK_BD74591CFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_couleur ADD CONSTRAINT FK_4EEB448CE8DD5A7 FOREIGN KEY (fleur_id) REFERENCES fleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fleur_couleur ADD CONSTRAINT FK_4EEB448CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bouquet_fleur DROP FOREIGN KEY FK_AFFEF2986C8DF983');
        $this->addSql('ALTER TABLE fleur_couleur DROP FOREIGN KEY FK_4EEB448CC31BA576');
        $this->addSql('ALTER TABLE fleur_evenement DROP FOREIGN KEY FK_BD74591CFD02F13');
        $this->addSql('ALTER TABLE bouquet_fleur DROP FOREIGN KEY FK_AFFEF298E8DD5A7');
        $this->addSql('ALTER TABLE fleur_saison DROP FOREIGN KEY FK_21743940E8DD5A7');
        $this->addSql('ALTER TABLE fleur_evenement DROP FOREIGN KEY FK_BD74591CE8DD5A7');
        $this->addSql('ALTER TABLE fleur_couleur DROP FOREIGN KEY FK_4EEB448CE8DD5A7');
        $this->addSql('ALTER TABLE fleur_saison DROP FOREIGN KEY FK_21743940F965414C');
        $this->addSql('ALTER TABLE bouquet DROP FOREIGN KEY FK_878E1707FB88E14F');
        $this->addSql('DROP TABLE bouquet');
        $this->addSql('DROP TABLE bouquet_fleur');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE fleur');
        $this->addSql('DROP TABLE fleur_saison');
        $this->addSql('DROP TABLE fleur_evenement');
        $this->addSql('DROP TABLE fleur_couleur');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE utilisateur');
    }
}
