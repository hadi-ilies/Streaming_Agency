<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180726081934 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment_episodes (id INT AUTO_INCREMENT NOT NULL, saison_id INT NOT NULL, author VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, content LONGTEXT NOT NULL, episode VARCHAR(255) NOT NULL, INDEX IDX_60913DDBF965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment_episodes ADD CONSTRAINT FK_60913DDBF965414C FOREIGN KEY (saison_id) REFERENCES saisons (id)');
        $this->addSql('ALTER TABLE movies CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE saisons CHANGE episodes episodes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE nb_episode nb_episode INT DEFAULT NULL, CHANGE nb_saison nb_saison INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comment_episodes');
        $this->addSql('ALTER TABLE movies CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE created_at created_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE saisons CHANGE episodes episodes LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE nb_episode nb_episode INT DEFAULT NULL, CHANGE nb_saison nb_saison INT DEFAULT NULL');
    }
}
