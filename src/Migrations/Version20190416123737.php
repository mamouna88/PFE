<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416123737 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adherent ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_90D3F060D60322AC ON adherent (role_id)');
        $this->addSql('ALTER TABLE paiement ADD adherent_id INT NOT NULL');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E25F06C53 ON paiement (adherent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060D60322AC');
        $this->addSql('DROP INDEX IDX_90D3F060D60322AC ON adherent');
        $this->addSql('ALTER TABLE adherent DROP role_id');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E25F06C53');
        $this->addSql('DROP INDEX IDX_B1DC7A1E25F06C53 ON paiement');
        $this->addSql('ALTER TABLE paiement DROP adherent_id');
    }
}
