<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200303130607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adresses (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, postal_adress LONGTEXT NOT NULL, postal_adress_2 LONGTEXT DEFAULT NULL, zip_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, phone_number VARCHAR(15) NOT NULL, adress_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bills_products DROP product_amount, DROP total_price_paid');
        $this->addSql('ALTER TABLE cart_products DROP product_amount');
        $this->addSql('ALTER TABLE reviews CHANGE comment comment LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE is_confirmed is_confirmed TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE adresses');
        $this->addSql('ALTER TABLE bills_products ADD product_amount INT DEFAULT NULL, ADD total_price_paid DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE cart_products ADD product_amount INT NOT NULL');
        $this->addSql('ALTER TABLE reviews CHANGE comment comment LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE is_confirmed is_confirmed TINYINT(1) DEFAULT \'0\' NOT NULL');
    }
}
