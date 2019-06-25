<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190625100845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE chapter_one (id INT AUTO_INCREMENT NOT NULL, filename VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, image_background VARCHAR(300) NOT NULL, music VARCHAR(300) NOT NULL, content LONGTEXT NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, api_token VARCHAR(255) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D6497BA2F5EB (api_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, reponse_a VARCHAR(255) NOT NULL, reponse_b VARCHAR(255) NOT NULL, reponse_c VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, extrait LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chapter_two (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, image_background VARCHAR(300) NOT NULL, music VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, chapter_one_id INT NOT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_16DB4F89A0C42998 (chapter_one_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89A0C42998 FOREIGN KEY (chapter_one_id) REFERENCES chapter_one (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89A0C42998');
        $this->addSql('DROP TABLE chapter_one');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE chapter_two');
        $this->addSql('DROP TABLE picture');
    }
}
