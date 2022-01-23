<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115091550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job (
            id INT AUTO_INCREMENT NOT NULL,
            property_id INT NOT NULL,
            summary VARCHAR(150) NOT NULL,
            description TEXT NOT NULL,
            status VARCHAR(255) NOT NULL,
            user_id INT NOT NULL,
            INDEX IDX_FBD8E0F8549213EC (property_id),
            INDEX IDX_FBD8E0F8A76ED395 (user_id),
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('INSERT INTO user (`first_name`, `last_name`) VALUES ("Steve", "Rayner")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8549213EC');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE user');
    }
}
