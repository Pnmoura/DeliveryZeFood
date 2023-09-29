<?php

declare(strict_types=1);

namespace Database\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929160948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Tabela responsável por cadastro de produtos';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(100) NOT NULL,
            description VARCHAR(200) NOT NULL,
            brand VARCHAR(20) NOT NULL,
            value DECIMAL(10) NOT NULL,
            products_category INT NOT NULL,
            created_at DATETIME NULL DEFAULT NOW(),
            updated_at DATETIME NULL DEFAULT NOW(),
            PRIMARY KEY (id)
        )DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE products
                ADD FOREIGN KEY (products_category) REFERENCES products_category(id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE products');
    }
}
