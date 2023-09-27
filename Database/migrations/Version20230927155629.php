<?php

declare(strict_types=1);

namespace Database\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927155629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Tabela para cadastro de novos estabelecimentos';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE estabilishment (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(100) NOT NULL,
            corporate_name VARCHAR(100) NOT NULL,
            cnpj VARCHAR(14) NOT NULL,
            public_place VARCHAR(30) NOT NULL,
            number VARCHAR(8) NOT NULL,
            neighborhoods VARCHAR(20) NOT NULL,
            city VARCHAR(20) NOT NULL,
            state VARCHAR(20) NOT NULL,
            uf VARCHAR(2) NOT NULL,
            establishment_category_id int NOT NULL,
            created_at DATETIME NULL DEFAULT NOW(),
            updated_at DATETIME NULL DEFAULT NOW(),
            PRIMARY KEY (id)
        )DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE estabilishment 
                ADD FOREIGN KEY (establishment_category_id) REFERENCES establishment_type(id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE estabilishment');
    }
}
