<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200228083221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE deals (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(12) NOT NULL, discount_percentage INT NOT NULL, expiration_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deals_user (deals_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_E607A00397ED4789 (deals_id), INDEX IDX_E607A003A76ED395 (user_id), PRIMARY KEY(deals_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deals_categories (deals_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_9402283F97ED4789 (deals_id), INDEX IDX_9402283FA21214B7 (categories_id), PRIMARY KEY(deals_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE deals_products (deals_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_D822012F97ED4789 (deals_id), INDEX IDX_D822012F6C8A81A9 (products_id), PRIMARY KEY(deals_id, products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deals_user ADD CONSTRAINT FK_E607A00397ED4789 FOREIGN KEY (deals_id) REFERENCES deals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deals_user ADD CONSTRAINT FK_E607A003A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deals_categories ADD CONSTRAINT FK_9402283F97ED4789 FOREIGN KEY (deals_id) REFERENCES deals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deals_categories ADD CONSTRAINT FK_9402283FA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deals_products ADD CONSTRAINT FK_D822012F97ED4789 FOREIGN KEY (deals_id) REFERENCES deals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deals_products ADD CONSTRAINT FK_D822012F6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE deals_user DROP FOREIGN KEY FK_E607A00397ED4789');
        $this->addSql('ALTER TABLE deals_categories DROP FOREIGN KEY FK_9402283F97ED4789');
        $this->addSql('ALTER TABLE deals_products DROP FOREIGN KEY FK_D822012F97ED4789');
        $this->addSql('DROP TABLE deals');
        $this->addSql('DROP TABLE deals_user');
        $this->addSql('DROP TABLE deals_categories');
        $this->addSql('DROP TABLE deals_products');
    }
}
