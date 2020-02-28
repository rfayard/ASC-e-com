<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200228082211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bills (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date DATE NOT NULL, total_price_without_taxes DOUBLE PRECISION NOT NULL, total_price_all_taxes_included DOUBLE PRECISION NOT NULL, INDEX IDX_22775DD0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bills_products (bills_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_24F5F28C2ABC37A4 (bills_id), INDEX IDX_24F5F28C6C8A81A9 (products_id), PRIMARY KEY(bills_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_products (cart_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_2D2515311AD5CDBF (cart_id), INDEX IDX_2D2515316C8A81A9 (products_id), PRIMARY KEY(cart_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bills ADD CONSTRAINT FK_22775DD0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE bills_products ADD CONSTRAINT FK_24F5F28C2ABC37A4 FOREIGN KEY (bills_id) REFERENCES bills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bills_products ADD CONSTRAINT FK_24F5F28C6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_products ADD CONSTRAINT FK_2D2515311AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_products ADD CONSTRAINT FK_2D2515316C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bills_products DROP FOREIGN KEY FK_24F5F28C2ABC37A4');
        $this->addSql('DROP TABLE bills');
        $this->addSql('DROP TABLE bills_products');
        $this->addSql('DROP TABLE cart_products');
    }
}
