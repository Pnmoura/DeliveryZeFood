<?php

declare(strict_types=1);

namespace Database\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230926205141 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criando Database responsável por definir o tipo do estabelecimento cadastrado';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE establishment_type (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(50) NOT NULL,
            created_at DATETIME NULL DEFAULT NOW(),
            updated_at DATETIME NULL DEFAULT NOW(),
            PRIMARY KEY (id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE establishment_type');

    }
}