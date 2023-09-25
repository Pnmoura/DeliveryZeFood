<?php

declare(strict_types=1);

namespace Database\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230901203847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criando Database de Usuario';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users (
            id INT AUTO_INCREMENT NOT NULL,
            fullname VARCHAR(255) NOT NULL,
            cpf VARCHAR(15) NOT NULL,
            birthdate DATE,
            telephone VARCHAR(20),
            address VARCHAR(100),
            number VARCHAR(20),
            complement VARCHAR(100),
            created_at DATETIME NULL DEFAULT NOW(),
            updated_at DATETIME NULL DEFAULT NOW(),
            PRIMARY KEY (id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() Database is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');

    }
}
