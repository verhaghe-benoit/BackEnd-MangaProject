<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106225242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE genre_list_anime (genre_list_id INT NOT NULL, anime_id INT NOT NULL, INDEX IDX_B6FE416462B8573 (genre_list_id), INDEX IDX_B6FE4164794BBE89 (anime_id), PRIMARY KEY(genre_list_id, anime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genre_list_anime ADD CONSTRAINT FK_B6FE416462B8573 FOREIGN KEY (genre_list_id) REFERENCES genre_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre_list_anime ADD CONSTRAINT FK_B6FE4164794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE genre ADD id_anime_id INT NOT NULL, ADD id_genre_list_id INT NOT NULL');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F82990521C FOREIGN KEY (id_anime_id) REFERENCES anime (id)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F8B8035416 FOREIGN KEY (id_genre_list_id) REFERENCES genre_list (id)');
        $this->addSql('CREATE INDEX IDX_835033F82990521C ON genre (id_anime_id)');
        $this->addSql('CREATE INDEX IDX_835033F8B8035416 ON genre (id_genre_list_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE genre_list_anime');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F82990521C');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F8B8035416');
        $this->addSql('DROP INDEX IDX_835033F82990521C ON genre');
        $this->addSql('DROP INDEX IDX_835033F8B8035416 ON genre');
        $this->addSql('ALTER TABLE genre DROP id_anime_id, DROP id_genre_list_id');
    }
}
