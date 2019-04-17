<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190417133001 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060D60322AC');
        $this->addSql('DROP INDEX IDX_90D3F060D60322AC ON adherent');
        $this->addSql('ALTER TABLE adherent ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP role_id, DROP mail_address');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F06092FC23A8 ON adherent (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F060A0D96FBF ON adherent (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F060C05FB297 ON adherent (confirmation_token)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_90D3F06092FC23A8 ON adherent');
        $this->addSql('DROP INDEX UNIQ_90D3F060A0D96FBF ON adherent');
        $this->addSql('DROP INDEX UNIQ_90D3F060C05FB297 ON adherent');
        $this->addSql('ALTER TABLE adherent ADD role_id INT NOT NULL, ADD mail_address VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_90D3F060D60322AC ON adherent (role_id)');
    }
}
