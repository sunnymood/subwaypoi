<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150819113618 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stations_lines (subway_coordinate_id VARCHAR(20) NOT NULL, subway_line_id VARCHAR(255) NOT NULL, INDEX IDX_2C620048E94B177 (subway_coordinate_id), INDEX IDX_2C62004CD2AC4BF (subway_line_id), PRIMARY KEY(subway_coordinate_id, subway_line_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stations_lines ADD CONSTRAINT FK_2C620048E94B177 FOREIGN KEY (subway_coordinate_id) REFERENCES subwaycoordinate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stations_lines ADD CONSTRAINT FK_2C62004CD2AC4BF FOREIGN KEY (subway_line_id) REFERENCES subwayline (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subwaypoi DROP money');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stations_lines');
        $this->addSql('ALTER TABLE subwaypoi ADD money NUMERIC(10, 0) NOT NULL');
    }
}
