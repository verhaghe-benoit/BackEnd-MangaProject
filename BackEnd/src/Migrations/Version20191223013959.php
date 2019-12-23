<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191223013959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F8124D3F8A');
        $this->addSql('DROP INDEX IDX_835033F8124D3F8A ON genre');
        $this->addSql('ALTER TABLE genre CHANGE id_genre_id id_genrelist_id INT NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F8CEFB45A FOREIGN KEY (id_genrelist_id) REFERENCES genre_list (id)');
        $this->addSql('CREATE INDEX IDX_835033F8CEFB45A ON genre (id_genrelist_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F8CEFB45A');
        $this->addSql('DROP INDEX IDX_835033F8CEFB45A ON genre');
        $this->addSql('ALTER TABLE genre CHANGE id_genrelist_id id_genre_id INT NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F8124D3F8A FOREIGN KEY (id_genre_id) REFERENCES genre_list (id)');
        $this->addSql('CREATE INDEX IDX_835033F8124D3F8A ON genre (id_genre_id)');
    }
}
